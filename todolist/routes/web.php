<?php

use App\Http\Controllers\AdController;
use App\Models\Ad;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\LocationController;



/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', [HomeController::class ,'home'])->name('home');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource("ad", AdController::class);
    Route::get('user/{id}', [ProfileController::class, 'showUserProfile'])->name('user.profile');
    Route::get('/ad/{ad}', [AdController::class, 'show'])->name('ad.show');


});



Route::prefix('admin')->group(function () {
    Route::get('register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('register', [AdminAuthController::class, 'register']);
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->middleware('auth:admin')->name('admin.dashboard');
});




Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('users', UserController::class);
    Route::resource('categories', CategorieController::class);
    Route::resource('conditions', ConditionController::class);
    Route::resource('locations', LocationController::class);
});


/*
Route::get('/ad/add', [AdController::class, 'addAds'])->name('ad.add_post');

Route::post('/ad', [AdController::class, 'store'])->name('ad.store');

Route::get('/ad/{id}', [AdController::class,'edit'])->name('ad.edit');

Route::patch('/ad/{id}', [AdController::class, 'update'])->name('ad.update');

Route::delete('/ad/delte/{id}', [AdController::class, 'destroy'])->name('ad.destroy');

 */
