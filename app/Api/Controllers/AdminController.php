<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Session;

class AdminController extends Controller
{

    function __construct()
    {
        Config::set('jwt.user', AdminUser::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => AdminUser::class,
        ]]);
    }

    public function unauthorized()
    {

        return response()->json([
            'status_code' => 401,
            'message'     => 'unauthorized',
        ], 401);
    }

    public function login(Request $request)
    {

        //form-data and raw json body (use content-type) both can be parsed with same request

        try {
            $credentials = $request->only('email', 'password');
            
            $token = JWTAuth::attempt($credentials);
            
            if ($token) {

                $currentUser = Auth::user();

                return response()->json([
                    'status_code' => 200,
                    'user'        => $currentUser,
                    'token'       => $token,
                ]);
            } else {

                return response()->json(['message' => 'Invalid Credentials']);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function create(Request $request){

        {
            try {
    
                $data = $request->only([
                    'email',
                    'password',
                    'confirmPassword',
                    'username',
                    'name',
                    'role',
                    'send_user_notification'
                    
                ]);
    
                if ($data['password'] != $data['confirmPassword']){
    
                    return response()->json(['message' => 'Password Not Match']);
    
                }
    
                $alreadyExistUser = AdminUser::where('email', $data['email'])->get();
    
                if ($alreadyExistUser->count()) {
    
                    return response()->json(['message' => 'User With this Email Already Exist']);
    
                }
    
                $orignal_password = $data['password'];
                $data['password'] = Hash::make($data['password']);
            
    
                $user = AdminUser::create($data);
    
                $user->orignal_password = $orignal_password;

                $token            = \JWTAuth::fromUser($user);

                $credentials = $request->only('email', 'password');
    
                $token = JWTAuth::attempt($credentials);
                
                if ($token) {
    
                    $currentUser = Auth::user();
    
                    return response()->json([
                        'status_code' => 200,
                        'data'        => $currentUser,
                        'token'       => $token,
                    ]);
                    
                } 
    
               
    
            } catch (JWTException $e) {
                return response()->json(['message' => $e->getMessage()]);
            }
        }

    }

}