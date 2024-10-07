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

                $request->session()->put('adminAccessToken', $token);

                $request->session()->flash('success', 'Login Success');
                return redirect()->route('adminDashboard');
            } else {

                $request->session()->flash('error', 'Login Failed');
                return redirect()->route('adminLogin');
            }
        } catch (JWTException $e) {
            $request->session()->flash('error', 'Login Failed');
            return redirect()->route('adminLogin');
        }
    }

    public function create(Request $request){

        {
            try {
    
                $data = $request->only([
                    'email',
                    'password',
                    'confirm_password',
                    'username',
                    'name',
                    'role',
                    
                ]);
    
                if ($data['password'] != $data['confirm_password']){
    
                    Session::flash('error','Password And Confirm Password Not Match');
                    return redirect()->route('register');
    
                }
    
                $alreadyExistUser = User::where('email', $data['email'])->get();
    
                if ($alreadyExistUser->count()) {
    
                    Session::flash('error','User With this Email Already Exist');
                    return redirect()->route('register');
    
                }
    
                $orignal_password = $data['password'];
                $data['password'] = Hash::make($data['password']);
            
    
                $user = User::create($data);
    
                $user->orignal_password = $orignal_password;
    
                Session::flash('success','Signup Success');
                return redirect()->route('homePage');
    
            } catch (JWTException $e) {
                return response()->json(['message' => $e->getMessage()]);
            }
        }

    }



}