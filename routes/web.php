<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/our-mission', [PageController::class, 'ourMission'])->name('ourMission');
Route::get('/overview', [PageController::class, 'overView'])->name('overView');
Route::get('/senior-team', [PageController::class, 'seniorTeam'])->name('seniorTeam');
Route::get('/hedge-fund', [PageController::class, 'hedgeFund'])->name('hedgeFund');
Route::get('/managed-account', [PageController::class, 'managedAccount'])->name('managedAccount');
Route::get('/our-approach', [PageController::class, 'ourApproach'])->name('ourApproach');
Route::get('/register', [PageController::class, 'register'])->name('register');
// Route::get('/login', [PageController::class, 'login'])->name('login');









