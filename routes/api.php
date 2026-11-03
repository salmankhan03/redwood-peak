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

// Rate limited per client IP (attempts per minute) to slow brute force and mail abuse
Route::post('/customer/signup', [UserController::class, 'signUp'])->middleware('throttle:20,1,signup')->name('customerSignup'); // user add , edit
Route::post('/customer/login', [UserController::class, 'login'])->middleware('throttle:10,1,login')->name('customerLogin');
Route::post('/authenticate', [UserController::class, 'getUser']);

Route::post('/forget-password', [ForgetPasswordController::class, 'sendForgetPasswordMail'])->middleware('throttle:5,1,forgot'); // send mail to
Route::post('/update-password-via-mail', [ForgetPasswordController::class, 'submitForgetPasswordData'])->middleware('throttle:10,1,reset');

Route::post('/page/list', [PageController::class, 'list']);
Route::post('/post/list', [PostController::class, 'list']);




// Route::post('/admin/login', [AdminController::class, 'login'])->name('adminLoginPost');
// Route::post('/admin/signup', [AdminController::class, 'create'])->name('adminUserCreate');

Route::middleware(['jwtMiddleware'])->group(function () {


    // Content management (upload / edit / delete) is for administrators only
    Route::prefix('/media')->group(function () {

        Route::post('/list', [MediaController::class, 'list']);

        Route::middleware(['adminMiddleware'])->group(function () {
            Route::post('/upload', [MediaController::class, 'upload']);
            Route::get('/{id}/delete', [MediaController::class, 'delete']);
        });

    });

    Route::prefix('/page')->middleware(['adminMiddleware'])->group(function () {

        Route::post('/upload', [PageController::class, 'upload']);
        Route::get('/{id}/delete', [PageController::class, 'delete']);
        Route::post('/multiple-delete', [PageController::class, 'multipleDelete']);

    });

    Route::prefix('/post')->group(function () {

        Route::get('/{id}/get-by-id', [PostController::class, 'getById']);

        Route::middleware(['adminMiddleware'])->group(function () {
            Route::post('/upload', [PostController::class, 'upload']);
            Route::get('/{id}/delete', [PostController::class, 'delete']);
            Route::post('/multiple-delete', [PostController::class, 'multipleDelete']);
            Route::post('/edit', [PostController::class, 'edit']);
        });

    });

    Route::prefix('/user')->group(function () {

        // Route::post('/upsert', [UserController::class, 'upsert']);

        // Administrators only
        Route::middleware(['adminMiddleware'])->group(function () {

            Route::post('/list', [UserController::class, 'list']);
            Route::get('/count-by-status' , [UserController::class, 'getUserCountByStatus']);
            Route::get('/{id}/delete', [UserController::class, 'delete']);
            Route::post('/multiple-delete', [UserController::class, 'multipleDelete']);

            Route::post('/bulk-role-change', [UserController::class, 'bulkRoleChange']);
            Route::post('/bulk-status-change', [UserController::class, 'bulkStatusChange']);

        });

        // Any logged-in user, but the controller limits them to their own record
        Route::get('/{id}/get-by-id', [UserController::class, 'getById']);
        Route::post('/update-password', [UserController::class, 'updatePassword']);

    
    });

});