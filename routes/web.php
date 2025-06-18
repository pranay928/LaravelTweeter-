<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidUser;

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

Route::get('/', [UserController::class, 'home'] )->name('home')->middleware(ValidUser::class);
Route::post('/tweet', [TweetController::class, 'tweet'])->name('tweet')->middleware(ValidUser::class);
Route::get('/tweets', [TweetController::class, 'indexTweet'])->name('indexTweet')->middleware(ValidUser::class);
Route::delete('/tweet/{id}', [TweetController::class, 'deleteTweet'])->name('deleteTweet');
Route::put('/tweetUpdate/{id}', [TweetController::class, 'updateTweet'])->name('updateTweet');



//for auth UserController 

Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/registerSave',[UserController::class, 'registerSave'])->name('registerSave');
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/loginAuth',[UserController::class, 'loginAuth'])->name('auth');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');
