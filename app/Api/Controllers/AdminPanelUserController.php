<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminPanelUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Session;
use Illuminate\Support\Facades\DB;

class AdminPanelUserController extends Controller
{

    // function __construct()
    // {
    //     Config::set('jwt.user', AdminUser::class);
    //     Config::set('auth.providers', ['users' => [
    //         'driver' => 'eloquent',
    //         'model' => AdminUser::class,
    //     ]]);
    // }

    public function upsert(Request $request){
        
        try{

            $data = $request->only([
                'id','name', 'username','email','role','password','status','send_user_notification','role_id'
            ]);

            AdminPanelUser::updateOrCreate(['id' => $data['id']], $data);

            return response()->json([
                'status_code' => 200,
                'maessage' => 'Upsert Successfully'
            ]);

        }
        catch (\Exception $e){

            return response()->json([
                'status_code' => 500,
                'maessage' => $e->getMessage()
            ]);

        }

    }

    public function getById($id){

        try {

            $data = AdminPanelUser::find($id);

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

    public function list(Request $reuqest){
        try {

            $list = AdminPanelUser::all();

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

    public function delete($id){

        try {

            $obj = AdminPanelUser::find($id);

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

            $list = DB::table('admin_panel_users')
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