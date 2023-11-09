<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', LoginController::class);
Route::get('/logout', LogoutController::class)->name('logout');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', RegisterController::class);

Route::get('/dashboard', [DashboardController::class, 'Index'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/edit-profile', [ProfileController::class, 'editProfile']);
Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');

