<?php

use App\Api\Controllers\AdminController;
use App\Api\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
})->name('homePage');
Route::get('/our-mission', [PagesController::class, 'ourMission'])->name('ourMission');
Route::get('/overview', [PagesController::class, 'overView'])->name('overView');
Route::get('/senior-team', [PagesController::class, 'seniorTeam'])->name('seniorTeam');
Route::get('/hedge-fund', [PagesController::class, 'hedgeFund'])->name('hedgeFund');
Route::get('/managed-account', [PagesController::class, 'managedAccount'])->name('managedAccount');
Route::get('/our-approach', [PagesController::class, 'ourApproach'])->name('ourApproach');
Route::get('/publications', [PagesController::class, 'publications'])->name('publications');
Route::get('/hedge-fund-reports', [PagesController::class, 'hedgeFundReports'])->name('hedgeFundReports');
Route::get('/managed-account-reports', [PagesController::class, 'managedAccountReports'])->name('managedAccountReports');
Route::get('/news', [PagesController::class, 'news'])->name('news');
Route::get('/visits', [PagesController::class, 'visits'])->name('visits');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [PagesController::class, 'login'])->name('login');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contactUs');
Route::get('/admin-login', [PagesController::class, 'adminLogin'])->name('adminLogin');
Route::get('/admin/dashboard', [PagesController::class, 'adminDashboard'])->name('adminDashboard');
Route::get('/media', [PagesController::class, 'media'])->name('media');
Route::get('/pages', [PagesController::class, 'pages'])->name('pages');
Route::get('/uploadDocument', [PagesController::class, 'uploadDocument'])->name('uploadDocument');
Route::get('/post', [PagesController::class, 'post'])->name('post');
Route::get('/post/create', [PagesController::class, 'postCreate'])->name('postCreate');

Route::post('/admin/user/register', [AdminController::class, 'create'])->name('adminPanelUserRegistration');
Route::get('/admin/user', [PagesController::class, 'showUserOverview'])->name('admin.user.overview');
Route::get('/admin/user/list', [PagesController::class, 'adminUserList'])->name('adminUserList');
Route::get('/user/edit/{username}', [PagesController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{username}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{username}', [PagesController::class, 'destroy'])->name('user.delete');


