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



}