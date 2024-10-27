<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ComicsController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;

Route::get('ping', function(){
    return response()->json(['messsage'=>'pong']);
});

Route::prefix('auth')->controller(AuthController::class)->group(function(){
    Route::get('/user','user');
    Route::post('/register','register');
    Route::post('/login','login');
    Route::post('/logout','logout');
});

Route::prefix('users')->controller(UserController::class)->group(function(){
    Route::post('/choisePreferens', 'choisePreferences');
    Route::put('/updatePreferens','updatePreferences');
});

Route::prefix('comics')->controller(ComicsController::class)->group(function(){
    Route::get('/getAllCategories', 'getAllCategories');
    Route::post('/bookingComic','bookingComic');
    Route::get('/getAllComics', 'getAllComics');
    Route::get('/getComicById/{id}', 'getComicById');
});

Route::prefix('reviews')->controller(ReviewController::class)->group(function(){
    Route::post('/createReview','createReview');
    Route::delete('/deleteReview/{id}','deleteReview');
});