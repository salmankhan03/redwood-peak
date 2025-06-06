<?php

use App\Api\Controllers\AdminController;
use App\Api\Controllers\AdminPanelUserController;
use App\Api\Controllers\ForgetPasswordController;
use App\Api\Controllers\MediaController;
use App\Api\Controllers\UserController;
use App\Api\Controllers\PageController;
use App\Api\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

Route::post('/customer/signup', [UserController::class, 'signUp'])->name('customerSignup'); // user add , edit
Route::post('/customer/login', [UserController::class, 'login'])->name('customerLogin');
Route::post('/authenticate', [UserController::class, 'getUser']);

Route::post('/forget-password', [ForgetPasswordController::class, 'sendForgetPasswordMail']); // send mail to 
Route::post('/update-password-via-mail', [ForgetPasswordController::class, 'submitForgetPasswordData']);

Route::post('/page/list', [PageController::class, 'list']);
Route::post('/post/list', [PostController::class, 'list']);



Route::get('/send-mail', [ForgetPasswordController::class, 'sendMail']);

// Route::post('/admin/login', [AdminController::class, 'login'])->name('adminLoginPost');
// Route::post('/admin/signup', [AdminController::class, 'create'])->name('adminUserCreate');

Route::middleware(['jwtMiddleware'])->group(function () {


    Route::prefix('/media')->group(function () {

        Route::post('/upload', [MediaController::class, 'upload']);
        Route::post('/list', [MediaController::class, 'list']);
        Route::get('/{id}/delete', [MediaController::class, 'delete']);
    
    });

    Route::prefix('/page')->group(function () {

        Route::post('/upload', [PageController::class, 'upload']);
        Route::get('/{id}/delete', [PageController::class, 'delete']);
        Route::post('/multiple-delete', [PageController::class, 'multipleDelete']);
    
    });

    Route::prefix('/post')->group(function () {

        Route::post('/upload', [PostController::class, 'upload']);
        Route::get('/{id}/delete', [PostController::class, 'delete']);
        Route::post('/multiple-delete', [PostController::class, 'multipleDelete']);
        Route::get('/{id}/get-by-id', [PostController::class, 'getById']);
        Route::post('/edit', [PostController::class, 'edit']);

    
    });

    Route::prefix('/user')->group(function () {

        // Route::post('/upsert', [UserController::class, 'upsert']);
        Route::post('/list', [UserController::class, 'list']);
        Route::get('/count-by-status' , [UserController::class, 'getUserCountByStatus']);
        Route::get('/{id}/delete', [UserController::class, 'delete']);
        Route::post('/multiple-delete', [UserController::class, 'multipleDelete']);
        Route::get('/{id}/get-by-id', [UserController::class, 'getById']);

        Route::post('/bulk-role-change', [UserController::class, 'bulkRoleChange']);
        Route::post('/bulk-status-change', [UserController::class, 'bulkStatusChange']);

        Route::post('/update-password', [UserController::class, 'updatePassword']);

    
    });

});