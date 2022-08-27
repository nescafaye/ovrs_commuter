<?php

use App\Http\Controllers\AccountController;
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

Route::view('/privacy-policy', 'privacy')->name('privacy');
Route::view('/terms-of-service', 'terms')->name('terms');

Route::get('/bookings', [App\Http\Controllers\BookingsController::class, 'index'])->name('bookings');

Route::get('/account/passengers/', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
Route::post('/account/passengers/', [App\Http\Controllers\AccountController::class, 'update'])->name('account.edit');

Route::get('/passengers', [App\Http\Controllers\PassengerController::class, 'index'])->name('passenger');

Route::get('account/settings/', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
Route::post('account/settings/', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.edit');

//logout
Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('');
 });


 // Social Login

 Route::get('/auth/google/redirect', [App\Http\Controllers\SocialLoginController::class, 'googleRedirect'])->name('googleRedirect');
 Route::get('/auth/google/callback', [App\Http\Controllers\SocialLoginController::class, 'googleCallback'])->name('googleCallback');

