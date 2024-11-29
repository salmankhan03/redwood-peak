<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostMedia;
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

class PostController extends Controller
{
    public function upload(Request $request){

        try{

            $files = $request->file('files');
    
            $postData = [];

            $data = $request->only([
                'title',
                'category',
                'content',
                'id',
                'is_disabled',
                'thumbnail_image',
                'image_caption_data',
                'year'
            ]);

            $image_caption_data = json_decode($data['image_caption_data'],true);

            foreach ($files as $file) {

                $type = explode("/",$file->getMimeType());

                if ($type[0] != 'image'){

                    return response()->json([
                        'status_code' => 500,
                        'message' => "Only Images are Allowed"
                    ]);

                    break;
                }
            }

            $post = Post::updateOrCreate(['id' => $data['id']], $data);

            if (!empty($data['id'])){

                PostMedia::where('post_id', $data['id'])->delete();

            }

            foreach ($files as   $file) {

                // $document = $request->file($fileName);
                
                $postData['path'] = $file;
                $postData['name'] = $file->getClientOriginalName();
                $postData['size_in_kb'] = $file->getSize();
                $postData['extension'] = $file->getClientOriginalExtension();
                $postData['created_by'] = 1;
                $postData['post_id'] = $post->id;
                $postData['is_thumbnail'] = $data['thumbnail_image'] == $file->getClientOriginalName() ? 1 : 0;
                $postData['caption'] = !empty($image_caption_data[$file->getClientOriginalName()]) ? $image_caption_data[$file->getClientOriginalName()] : null;
    
                PostMedia::create($postData);
    
            }
    
            return response()->json([
                'status_code' => 200,
                'message' => "Upsert Successfully"
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

        $searchParam = $request->only([
            'category',
            'text',
            'year'
          
        ]);

        try{

            $criteria = [];
            
            $qb = Post::with('media' , 'thumbnail')->where('is_disabled' , 0);

            if (!empty($searchParam['category'])){
                $criteria[] = ['type', '=',  $searchParam['category']];
            }

            if (!empty($searchParam['year'])){
                $criteria[] = ['year', '=',  $searchParam['year']];
            }

            if (!empty($searchParam['text'])){

                $criteria[] = ['file_name', 'like', '%' . $searchParam['text'] . "%"];
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

    public function getById($id){

        // need to add category and filter
        
        try{
            
            $data = Post::with('media' , 'thumbnail')->where('is_disabled' , 0)->where('id' , $id)->get();

            return response()->json([
                'status_code' => 200,
                'data' => $data
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
        try{

            Post::where('id', $id)->update(['is_disabled' => 1]);
            Post::where('id', $id)->delete();

            return response()->json([
                'status_code' => 200,
                'message' => 'Deleted Successfully'
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

            if (!empty($ids)){

                Post::whereIn('id', $ids)->update(['is_disabled' => 1]);
                Post::whereIn('id', $ids)->delete();

                return response()->json([
                    'status_code' => 200,
                    'message' => 'Multiple Pages Deleted Successfully'
                ]);
            }
            else{
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Ids Not Found'
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