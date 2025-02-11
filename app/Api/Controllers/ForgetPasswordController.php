<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
use Illuminate\Support\Str;
use Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{

    
    public function sendForgetPasswordMail(Request $request){ 
        // record token creation
        // mail sending with url that contains token

        try{

            $token = Str::random(64);


            PasswordResetToken::create([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
            ]);

            $url = env('APP_FROENTEND_URL') . "?token=" . $token;

            Mail::send('email.forgetPassword', ['url' => $url], function($message) use($request){

                $message->to($request->email);
  
                $message->subject('Reset Password');
  
            });

        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }
    
    public function submitForgetPasswordData(Request $request){
        // check token , email , password and confirm password
        // delete token record

        try{

        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }

    }


}