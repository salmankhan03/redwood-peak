<?php

use App\Api\Controllers\AdminController;
use App\Api\Controllers\AdminPanelUserController;
use App\Api\Controllers\MediaController;
use App\Api\Controllers\UserController;
use App\Api\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

Route::post('/customer/signup', [UserController::class, 'signUp'])->name('customerSignup');
Route::post('/customer/login', [UserController::class, 'login'])->name('customerLogin');

Route::post('/admin/login', [AdminController::class, 'login'])->name('adminLoginPost');
Route::post('/admin/signup', [AdminController::class, 'create'])->name('adminUserCreate');


// Route::group(['middleware' => 'auth.jwt'], function () {
// });

// will add custom middleware for admin panel usage

Route::prefix('/media')->group(function () {

    Route::post('/upload', [MediaController::class, 'upload']);
    Route::post('/list', [MediaController::class, 'list']);
    Route::get('/{id}/delete', [MediaController::class, 'delete']);
   
});

Route::prefix('/page')->group(function () {

    Route::post('/upload', [PageController::class, 'upload']);
    Route::post('/list', [PageController::class, 'list']);
    Route::get('/{id}/delete', [PageController::class, 'delete']);
    Route::post('/multiple-delete', [PageController::class, 'multipleDelete']);
   
});

Route::prefix('/admin-panel-user')->group(function () {

    Route::post('/upsert', [AdminPanelUserController::class, 'upsert']);
    Route::post('/list', [AdminPanelUserController::class, 'list']);
    Route::get('/user-count-by-status' , [AdminPanelUserController::class, 'getUserCountByStatus']);
    Route::get('/{id}/delete', [AdminPanelUserController::class, 'delete']);
    Route::post('/multiple-delete', [AdminPanelUserController::class, 'multipleDelete']);
    Route::get('/{id}/get-by-id', [AdminPanelUserController::class, 'getById']);

   
});