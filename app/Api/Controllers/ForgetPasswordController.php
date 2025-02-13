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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class ForgetPasswordController extends Controller
{

    public function __construct()
    {
        ini_set('max_execution_time', 0);
    }
    
    public function sendForgetPasswordMail(Request $request){ 

        set_time_limit(0);

        try{

            $alreadyExistUser = User::where('email', $request->email)->get();
    
            if (!isset($alreadyExistUser->count())) {

                return response()->json(['message' => 'User Not Found']);

            }

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

            return response()->json([
                'status_code' => 200,
                'message' => 'Mail Send Successfully'
            ]);

        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }
    
    public function submitForgetPasswordData(Request $request){

        try{

            $data = $request->only([
                'token',
                'email',
                'password'
            ]);

            if (!isset($data['token']) ||!isset($data['email']) || !isset($data['password'])){

                return response()->json([
                    'status_code' => 500,
                    'message' => 'Token not found'
                ]);

            }

            $updatePassword = PasswordResetToken::where([
                                'email' => $data['email'], 
                                'token' => $data['token']
                              ])->get();
            
            if(!$updatePassword){

                return response()->json([
                    'status_code' => 500,
                    'message' => 'Email not Found'
                ]);
            }

            User::where('email', $data['email'])->update(['password' => Hash::make($data['password'])]);

            PasswordResetToken::where([
                'email' => $data['email'], 
                'token' => $data['token']
              ])->delete();

            return response()->json([
                'status_code' => 200,
                'message' => 'Password Updated Successfully'
            ]);

        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }

    }


}