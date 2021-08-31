<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

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



Route::get('/register', [RegistrationController::class, 'createForm']);

Route::post('/register', [RegistrationController::class, 'RegisterForm'])->name('register.store');

use App\Http\Controllers\ProductController;


  
Route::resource('products', ProductController::class);
