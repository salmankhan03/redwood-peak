<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Page;
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

class PageController extends Controller
{
    public function upload(Request $request){

        try{

            $files = $_FILES;
    
            $pageData = [];

            $data = $request->only([
                'type',
                'year',
                'hedge_fund_report_type',
                'name'
            ]);
    
            foreach ($files as  $fileName => $file) {

                $type = explode("/",$file['type']);

                if ($type[0] != 'application'){

                    return response()->json([
                        'status_code' => 500,
                        'message' => "Only Document Is Allowed"
                    ]);

                    break;
                }
    
                $document = $request->file($fileName);


                $pageData['type'] = $data['type'];
                $pageData['year'] = $data['year'];
                $pageData['name'] = isset($data['name']) ? $data['name'] : null;
                $pageData['hedge_fund_report_type'] = $data['hedge_fund_report_type'];
                
                $pageData['file_name'] = $document->getClientOriginalName();
                $pageData['file_path'] = $document;
                $pageData['size_in_kb'] = $document->getSize();
                $pageData['extension'] = $document->getClientOriginalExtension();
                $pageData['created_by'] = 1;
    
                Page::create($pageData);
    
            }
    
            return response()->json([
                'status_code' => 200,
                'message' => "Successfully Created"
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
            'type',
            'year',
            'text',
            'hedge_fund_report_type'
        ]);

        try{

            $criteria = [];
            
            $qb = Page::where('is_enabled' , 1);

            if (!empty($searchParam['type'])){
                $criteria[] = ['type', '=',  $searchParam['type']];
            }

            if (!empty($searchParam['year'])){

                $criteria[] = ['year', '=', $searchParam['year']];
            }

            if (!empty($searchParam['text'])){

                $criteria[] = ['file_name', 'like', '%' . $searchParam['text'] . "%"];
            }

            if (!empty($searchParam['hedge_fund_report_type'])){

                $criteria[] = ['hedge_fund_report_type', '=', $searchParam['hedge_fund_report_type'] ];
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

    public function delete($id){
        try{

            Page::where('id', $id)->update(['is_enabled' => 0]);

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

            Page::whereIn('id', $ids)->delete();

            return response()->json([
                'status_code' => 200,
                'message' => 'Multiple Pages Deleted Successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }
}