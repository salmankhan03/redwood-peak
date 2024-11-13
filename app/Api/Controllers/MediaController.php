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

class MediaController extends Controller
{
    public function uploadMedia(Request $request){

        $files = $_FILES;
    
        $imageData = [];

        foreach ($files as  $fileName => $file) {

            $image = $request->file($fileName);

            $imageData['image'] = $image;
            $imageData['original_name'] = $image->getClientOriginalName();
        }


    }
}