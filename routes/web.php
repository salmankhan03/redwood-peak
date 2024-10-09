<?php

use App\Api\Controllers\AdminController;
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
Route::get('/publications', [PageController::class, 'publications'])->name('publications');
Route::get('/hedge-fund-reports', [PageController::class, 'hedgeFundReports'])->name('hedgeFundReports');
Route::get('/managed-account-reports', [PageController::class, 'managedAccountReports'])->name('managedAccountReports');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/visits', [PageController::class, 'visits'])->name('visits');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');
Route::get('/admin-login', [PageController::class, 'adminLogin'])->name('adminLogin');
Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])->name('adminDashboard');
Route::get('/media', [PageController::class, 'media'])->name('media');
Route::get('/pages', [PageController::class, 'pages'])->name('pages');
Route::get('/uploadDocument', [PageController::class, 'uploadDocument'])->name('uploadDocument');
Route::get('/post', [PageController::class, 'post'])->name('post');
Route::get('/post/create', [PageController::class, 'postCreate'])->name('postCreate');

Route::post('/admin/user/register', [AdminController::class, 'create'])->name('adminPanelUserRegistration');
Route::get('/admin/user', [PageController::class, 'showUserOverview'])->name('admin.user.overview');
Route::get('/admin/user/list', [PageController::class, 'adminUserList'])->name('adminUserList');
Route::get('/user/edit/{username}', [PageController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{username}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{username}', [PageController::class, 'destroy'])->name('user.delete');


