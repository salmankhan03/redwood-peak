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
    
            if ($alreadyExistUser->count() == 0) {

                return response()->json(['message' => 'User Not Found']);

            }

            $token = Str::random(64);

            // Check if email already exists
            $existingToken = PasswordResetToken::where('email', $request->email)->first();

            if ($existingToken) {
                // Update existing token
                $existingToken->update([
                    'token' => hash('sha256', $token),
                    'created_at' => Carbon::now()
                ]);
            } else {
                // Create new token (only the hash is stored; the plain token goes in the email)
                PasswordResetToken::create([
                    'email' => $request->email,
                    'token' => hash('sha256', $token),
                    'created_at' => Carbon::now()
                ]);
            }

            $url = env('APP_FROENTEND_URL') . "?token=" . $token;

            // Use Mailgun HTTP API instead of Laravel Mail
            $mg = \Mailgun\Mailgun::create(env('MAILGUN_API_KEY'));
            
            // Create HTML content for the email
            $htmlContent = view('email.forgetPassword', ['url' => $url])->render();
            
            $result = $mg->messages()->send(env('MAILGUN_DOMAIN'), [
                'from'    => 'Redwood Peak <noreply@redwoodpeak.com>',
                'to'      => $request->email,
                'subject' => 'Reset Password - Redwood Peak',
                'html'    => $htmlContent
            ]);

            return response()->json([
                'status_code' => 200,
                'message' => 'Mail Send Successfully'
            ]);

        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $this->errorMessage($e)
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

            if (!isset($data['token']) ||!isset($data['email']) || !isset($data['password'])
                || !is_string($data['token']) || !is_string($data['email']) || !is_string($data['password'])){

                return response()->json([
                    'status_code' => 500,
                    'message' => 'Token not found'
                ]);

            }

            if (strlen($data['password']) < 8){

                return response()->json([
                    'status_code' => 422,
                    'message' => 'Password must be at least 8 characters'
                ], 422);

            }

            // The row must exist for this email, the token must match, and it must be recent.
            $resetRow = PasswordResetToken::where('email', $data['email'])->first();

            $valid = $resetRow
                && hash_equals((string) $resetRow->token, hash('sha256', $data['token']))
                && $resetRow->created_at
                && Carbon::parse($resetRow->created_at)->gt(Carbon::now()->subMinutes(60));

            if (!$valid){

                return response()->json([
                    'status_code' => 400,
                    'message' => 'Invalid or expired token'
                ], 400);

            }

            User::where('email', $data['email'])->update(['password' => Hash::make($data['password'])]);

            // Single use: remove the token once the password has changed
            PasswordResetToken::where('email', $data['email'])->delete();

            return response()->json([
                'status_code' => 200,
                'message' => 'Password Updated Successfully'
            ]);

        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $this->errorMessage($e)
            ]);
        }

    }


}