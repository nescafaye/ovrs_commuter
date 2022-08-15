<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/bookings', [App\Http\Controllers\BookingsController::class, 'index'])->name('bookings');
Route::get('/passenger', [App\Http\Controllers\PassengerController::class, 'index'])->name('passenger');
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('');
 });


 // Social Login

Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('googleRedirect');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('googleCallback');

