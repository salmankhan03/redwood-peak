<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Media;
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

class MediaController extends Controller
{
    public function upload(Request $request){

        try{

            $files = $_FILES;
    
            $imageData = [];
    
            foreach ($files as  $fileName => $file) {
    
                $image = $request->file($fileName);
                
                $category = explode("/",$image->getType());

                $imageData['name'] = $image->getClientOriginalName();
                $imageData['category'] = $category[0];
                $imageData['path'] = $image;
                $imageData['size_in_kb'] = $image->getSize();
                $imageData['extension'] = $image->getClientOriginalExtension();
                $imageData['created_by'] = 1;
    
                Media::create($imageData);
    
            }
    
            return response()->json([
                'status_code' => 200,
                'message' => "Successfully Uploaded"
            ]);

        }

        catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }
       

    }

    public function list(Request $request){

        // need to add category and filter

        $pageSize = !empty($request->get('pageSize')) ? $request->get('pageSize') : 10;
        
        try{
            
            $list = Media::where('is_enabled' , 1)->paginate($pageSize);

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