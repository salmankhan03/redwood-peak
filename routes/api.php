<?php

use App\Api\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

Route::post('/customer/login', [UserController::class, 'login'])->name('customerLogin');
Route::post('/customer/signup', [UserController::class, 'signUp'])->name('customerSignup');


Route::group(['middleware' => 'auth.jwt'], function () {



});