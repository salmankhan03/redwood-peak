<?php

use App\Api\Controllers\AdminController;
use App\Api\Controllers\MediaController;
use App\Api\Controllers\UserController;
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
   
});