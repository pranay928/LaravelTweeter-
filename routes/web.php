<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

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
    return view('welcome');
})->name('home');
Route::post('/tweet', [TweetController::class, 'tweet'])->name('tweet');
Route::get('/tweets', [TweetController::class, 'indexTweet'])->name('indexTweet');
Route::delete('/tweet/{id}', [TweetController::class, 'deleteTweet'])->name('deleteTweet');
Route::put('/tweetUpdate/{id}', [TweetController::class, 'updateTweet'])->name('updateTweet');