<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialAuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['belum.login'])->group(function(){
    Route::controller(DataController::class)->group(function () {
        Route::get('/dashboard', 'data');
    });

});

Route::middleware(['sudah.login'])->group(function(){
    Route::controller(UserController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/latihan','latihan');
        Route::post('/login', 'login')->name('login');
        Route::get('/register', 'registerView');
        Route::post('/register', 'register')->name('register');
    });
});
Route::controller(UserController::class)->group(function(){
    Route::get('logout', 'logout')->name('logout');
});
