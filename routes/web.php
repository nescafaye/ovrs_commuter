<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMessageController;
use Illuminate\Notifications\Notification;

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/privacy-policy', 'privacy')->name('privacy');
Route::view('/terms-of-service', 'terms')->name('terms');

Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions');

Route::get('profile/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('profile/', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.edit');

Route::get('/passengers', [App\Http\Controllers\PassengerController::class, 'index'])->name('passenger');

Route::get('settings/', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
Route::post('settings/', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.edit');

// Route::get('/bookings/search', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/search/results', [App\Http\Controllers\SearchController::class, 'searchSeats'])->name('search.seat');
Route::get('/search/van', [App\Http\Controllers\SearchController::class, 'searchVan'])->name('search.van');

Route::get('payment', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment');
Route::get('checkout', [App\Http\Controllers\PaymentController::class, 'createPayment'])->name('checkout');

Route::get('payment/success/', [App\Http\Controllers\PaymentController::class, 'successPayment'])->name('success');


//logout
Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('');
 });


// Google Login

Route::get('/auth/google/redirect', [App\Http\Controllers\SocialLoginController::class, 'googleRedirect'])->name('googleRedirect');
Route::get('/auth/google/callback', [App\Http\Controllers\SocialLoginController::class, 'googleCallback'])->name('googleCallback');

// Notif
// Route::get('send', [SendMessageController::class, 'index'])->name('send');
// Route::post('sendMessage', [SendMessageController::class, 'sendMessage'])->name('postMessage');

Route::get('send', [NotificationController::class, 'index'])->name('notification');
// Route::post('post',[NotificationController::class, 'sendNotification'])->name('postMessage');
Route::get('post', [NotificationController::class, 'postMessage'])->name('postMessage');




