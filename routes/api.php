<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'auth.jwt'], function () {

    // Route::get('/get-admin-user', [AdminUserController::class, 'getUser']);

    // Route::get('/{id}/get-customer-by-id', [UserController::class, 'getUser']);

    // Route::get('/{id}/get-admin-user', [AdminUserController::class, 'getAdminById']);

    // Route::get('/{id}/get-customer', [AdminUserController::class, 'getUserById']);

    // Route::post('/customer/update', [UserController::class, 'updateUser']);



});