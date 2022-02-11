<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentController;
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


Route::get('/signup/{locale?}', [AuthController::class, 'viewSignUp'])->name('view-sign-up');
Route::post('/signup/{locale?}', [AuthController::class, 'signUp'])->name('sign-up');
Route::get('/login/{locale?}', [AuthController::class, 'viewLogin'])->name('view-login');
Route::post('/login/{locale?}', [AuthController::class, 'login'])->name('login');
Route::get('/logout/{locale?}', [AuthController::class, 'logout'])->name('logout');

Route::get('/index/{locale?}', [HomeController::class, 'viewIndex'])->name('view-index');
Route::get('/home/{locale?}', [HomeController::class, 'viewHome'])->name('view-home');
Route::get('/response/{locale?}', [HomeController::class, 'viewResponse'])->name('view-response');

Route::get('/profile/{locale?}', [ProfileController::class, 'viewProfile'])->name('view-profile');
Route::put('/profile/{locale?}', [ProfileController::class, 'updateProfile'])->name('update-profile');

Route::get('account-maintenance/{locale?}', [AccountController::class, 'viewAccountMaintenance'])->name('view-account-maintenance');
Route::get('account-maintenance/{id}/{locale?}', [AccountController::class, 'viewAccountRoleDetails'])->name('view-account-role-details');
Route::put('account-maintenance/{id}/{locale?}', [AccountController::class, 'updateRole'])->name('update-role');
Route::delete('account-maintenance/{id}/{locale?}', [AccountController::class, 'deleteAccount'])->name('delete-account');

Route::get('/ebook-details/{id}/{locale?}', [RentController::class, 'viewEbookDetails'])->name('view-ebook-details');

Route::post('/cart/{id}/{locale?}', [RentController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart/{locale?}', [RentController::class, 'viewCart'])->name('view-cart');
Route::delete('/cart/{id}/{locale?}', [RentController::class, 'deleteCartItem'])->name('delete-cart-item');
Route::post('/order/{locale?}', [RentController::class, 'addToOrder'])->name('add-to-order');
Route::get('/order/{locale?}', [RentController::class, 'viewOrder'])->name('view-order');

Route::redirect('/', '/index');
