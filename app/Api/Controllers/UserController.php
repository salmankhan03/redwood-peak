<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Session;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class UserController extends Controller
{

    public function unauthorized()
    {

        return response()->json([
            'status_code' => 401,
            'message'     => 'unauthorized',
        ], 401);
    }

    public function getUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'User not found'], 404);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Invalid token'], 400);
        }

        return response()->json([
            'status_code' => 200,
            'message'     => $user
        ], 200);
    }

    public function login(Request $request)
    {

        //form-data and raw json body (use content-type) both can be parsed with same request

        try {
            // Check if user exists and password is empty/null
            $user = User::where('email', $request->email)->first();
            
            if ($user && (empty($user->password) || is_null($user->password))) {
                return response()->json([
                    'status_code' => 401,
                    'message' => 'Reset Password'
                ], 401);
            }

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

                return response()->json([
                    'status_code' => 401,
                    'message' => 'Invalid Credentials'
                ], 401);
                
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
                'role_id',
                'is_disabled'
            ]);

            // if ($data['password'] != $data['confirm_password']){

            //     return response()->json(['message' => 'Password Not Match']);

            // }

            $alreadyExistUser = User::where('email', $data['email'])->get()->toArray();

            if (count($alreadyExistUser)){

                if (empty($data['id'])){

                    return response()->json(['message' => 'User With this Email Already Exist' , 'status_code' => 500]);

                }

                else{

                    if ($data['id'] != $alreadyExistUser[0]['id']){
                        
                    }

                }

            }

            // if ($alreadyExistUser->count() && !empty($data['id'])) { // user edit
            //     if (!empty($alreadyExistUser)){
            //         if ($alreadyExistUser[0]->id != $data['id']){

            //             return response()->json(['message' => 'User With this Email Already Exist' , 'status_code' => 500]);
            //         }
            //     }

            // }

            // if (empty($data['id'])){

            //     if ($alreadyExistUser->count()) { // user edit
            //         if (!empty($alreadyExistUser)){
            //             if (empty($alreadyExistUser[0]->id)){
                            
            //                 return response()->json(['message' => 'User With this Email Already Exist' , 'status_code' => 500]);
            //             }
            //         }
                    
            //     }
            // }


            if (empty($data['id']) && empty($data['password'])){

                return response()->json([
                    'status_code' => 500,
                    'message' => 'Password Needed For User Creation'
                ]);

            }

            if (empty($data['id'])){

                $orignal_password = $data['password'];
                $data['password'] = Hash::make($data['password']);

            }

            if (!empty($data['id'])){

                unset($data['password']);
                unset($data['confirm_password']);

            }

            
            
            $data['name'] = $data['first_name'] .' '. $data['last_name'];

            $user = User::updateOrCreate(['id' => $data['id']], $data);

            if (empty($data['id'])){

                $user->orignal_password = $orignal_password;

            }

            $token            = \JWTAuth::fromUser($user);

            // $credentials = $request->only('email', 'password');

            // $token = JWTAuth::attempt($credentials);
            
            if ($token) {

                $currentUser = Auth::user();

                return response()->json([
                    'status_code' => 200,
                    'user'        => $user,
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

            $criteria = [];
            
            if (!empty($query['status'])){
                $criteria[] = ['status', '=',  $query['status']];
            }

            $qb->where($criteria)->orderBy('id', 'DESC');

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

    public function bulkStatusChange(Request $request)
    {
        try {

            $ids = explode(",",  $request->only('ids')['ids']);
            $data = $request->only('status');

            if (!empty($ids) && !empty($data['status']))
            {
                
                User::whereIn('id', $ids)->update(['status' => $data['status']]);

                return response()->json([
                    'status_code' => 200,
                    'message' => 'Multiple Records Updated Successfully'
                ]);

            }

            else{
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Status Or ids not found'
                ]);
            }


          
        } catch (\Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function bulkRoleChange(Request $request)
    {
        try {

            $ids = explode(",",  $request->only('ids')['ids']);
            $data = $request->only('role' , 'role_id');

            $updateData = [];

            if (!empty($data['role'])){

                $updateData['role'] = $data['role'];

            }

            if (!empty($data['role_id'])){

                $updateData['role_id'] = $data['role_id'];

            }

            if (!empty($ids))
            {
                
                User::whereIn('id', $ids)->update($updateData);

            }

            if (!empty($ids) && (!empty($data['role_id']) || !empty($data['role'])))
            {

                return response()->json([
                    'status_code' => 200,
                    'message' => 'Multiple Records Updated Successfully'
                ]);

            }

            if (empty($ids) && empty($data['role_id']) && empty($data['role'])) {
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Role Or ids not found'
                ]);
            }

            
        } catch (\Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function updatePassword(Request $request){

        try{

            $data = $request->only('user_id' , 'old_password' , 'new_password' , 'confirm_password');

            if (empty($data['new_password']) || empty($data['confirm_password'])  || ($data['new_password'] != $data['confirm_password'])){

                return response()->json([
                    'status_code' => 500,
                    'message' => 'Password Not Match'
                ]);

            }

            $user = User::find($data['user_id']);

            if ($user->count()){

                if (Hash::check($data['old_password'] , $user->password)){

                    $newPassword = Hash::make($data['new_password']);

                    User::where('id', $data['user_id'])->update(['password' => $newPassword]);
    
                    return response()->json([
                        'status_code' => 500,
                        'message' => 'Password Updated Successfully'
                    ]);

                }

                else{
                    return response()->json([
                        'status_code' => 500,
                        'message' => "Your Current password is not match"
                    ]);
                }

            }
            else{
                return response()->json([
                    'status_code' => 500,
                    'message' => 'User Not Found'
                ]);
            }
        
        } catch (\Exception $e) {

            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);

        }

    }

}
