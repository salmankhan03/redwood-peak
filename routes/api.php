<?php

use App\Api\Controllers\AdminController;
use App\Api\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

Route::post('/customer/signup', [UserController::class, 'signUp'])->name('customerSignup');

Route::post('/customer/login', [UserController::class, 'login'])->name('customerLogin');
Route::post('/admin/login', [AdminController::class, 'login'])->name('adminLoginPost');


// Route::group(['middleware' => 'auth.jwt'], function () {
// });

// will add custom middleware for admin panel usage
    
Route::post('/admin/user/create', [AdminController::class, 'create'])->name('adminUserCreate');