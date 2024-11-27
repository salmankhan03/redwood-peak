<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
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
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

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

    public function signUp(Request $request)
    {
        try {

            $data = $request->only([
                'first_name',
                'last_name',
                'password',
                'confirm_password',
                'email',
                'country',
                'company_name',
                'contact_no',
                'position',
                'username',
                'role',
                'id',
                'name',
                'status',
                'send_user_notification',
                'role_id'
            ]);

            // if ($data['password'] != $data['confirm_password']){

            //     return response()->json(['message' => 'Password Not Match']);

            // }

            $alreadyExistUser = User::where('email', $data['email'])->get();

            if ($alreadyExistUser->count() && $alreadyExistUser->id != $data['id']) {

                return response()->json(['message' => 'User With this Email Already Exist']);

            }

            $orignal_password = $data['password'];
            $data['password'] = Hash::make($data['password']);
            
            $data['name'] = $data['first_name'] .' '. $data['last_name'];

            $user = User::create($data);

            $user->orignal_password = $orignal_password;

            $token            = \JWTAuth::fromUser($user);

            $credentials = $request->only('email', 'password');

            $token = JWTAuth::attempt($credentials);
            
            if ($token) {

                $currentUser = Auth::user();

                return response()->json([
                    'status_code' => 200,
                    'user'        => $currentUser,
                    'token'       => $token,
                ]);
                
            } 

        } catch (JWTException $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function getById($id){

        try {

            $data = User::find($id);

            if ($data){

                return response()->json([
                    'status_code' => 200,
                    'data' => $data
                ]);

            }

            else{
                return response()->json([
                    'status_code' => 200,
                    'message' => 'Not Found'
                ]);
            }
            
        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }

    }

    public function list(Request $request){

        try {

            $pageSize = !empty($request->get('pageSize')) ? $request->get('pageSize') : 10;

            $query = $request->only([
                'status',
                'pageSize'
            ]);

            $qb = User::whereRaw('1 = 1');
            
            if (!empty($query['status'])){
                $criteria[] = ['status', '=',  $query['status']];
            }

            $qb->where($criteria);

            $list = $qb->paginate($pageSize);

            return response()->json([
                'status_code' => 200,
                'list' => $list
            ]);

        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function multipleDelete(Request $request)
    {
        try {
            $ids = explode(",",  $request->only('ids')['ids']);

            User::whereIn('id', $ids)->delete();

            return response()->json([
                'status_code' => 200,
                'message' => 'Multiple Records Deleted Successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function delete($id){

        try {

            $obj = User::find($id);

            if ($obj) {

                $obj->delete();

                return response()->json([
                    'status_code' => 200,
                    'message' => 'Deleted Successfully'
                ], 200);

            } else {
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Not Found'
                ], 500);
            }

        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }

    }

    public function getUserCountByStatus(){

        try{

            $list = DB::table('users')
                 ->select('status', DB::raw('count(*) as total'))
                 ->groupBy('status')
                 ->get();

            return response()->json([
                'status_code' => 200,
                'list' => $list
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
