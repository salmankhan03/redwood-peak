<?php

use App\Api\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
})->name('homePage');
Route::get('/our-mission', [PageController::class, 'ourMission'])->name('ourMission');
Route::get('/overview', [PageController::class, 'overView'])->name('overView');
Route::get('/senior-team', [PageController::class, 'seniorTeam'])->name('seniorTeam');
Route::get('/hedge-fund', [PageController::class, 'hedgeFund'])->name('hedgeFund');
Route::get('/managed-account', [PageController::class, 'managedAccount'])->name('managedAccount');
Route::get('/our-approach', [PageController::class, 'ourApproach'])->name('ourApproach');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');
Route::get('/admin-login', [PageController::class, 'adminLogin'])->name('adminLogin');
Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])->name('adminDashboard');
Route::get('/admin/user', [PageController::class, 'user'])->name('user');
Route::get('/media', [PageController::class, 'media'])->name('media');
Route::get('/pages/create', [PageController::class, 'pageCreate'])->name('pageCreate');
// Route::post('/pages', [PageController::class, 'store'])->name('pages.store');


