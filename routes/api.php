<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ComicsController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\FavoriteComicController;

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
    Route::get('/getAllFavorites','getAllFavorites');
    Route::post('/choisePreferens', 'choisePreferences');
    Route::put('/updatePreferens','updatePreferences');
    Route::get('/{id}/checkFavoriteStatus','checkFavoriteStatus');
    Route::get('/{id}/checkBookingStatus','checkBookingStatus');
    Route::get('/{id}/checkComicFavoriteStatus','checkComicFavoriteStatus');
});

Route::prefix('comics')->controller(ComicsController::class)->group(function(){
    Route::get('/getAllCategories', 'getAllCategories');
    Route::post('/bookingComic','bookingComic');
    Route::get('/getAllComics', 'getAllComics');
    Route::get('/getComicById/{id}', 'getComicById');
    Route::get('/getComicsForCategory/{id}','getComicsForCategory');
});

Route::prefix('reviews')->controller(ReviewController::class)->group(function(){
    Route::post('/createReview','createReview');
    Route::delete('/deleteReview/{id}','deleteReview');
});

Route::prefix('bookings')->controller(BookingController::class)->group(function (){
    Route::get('/index','index');
    Route::post('/store','store');
});

Route::prefix('notifications')->controller(NotificationController::class)->group(function (){
    Route::get('/getNotifications','notifications');
});

Route::prefix('favorites')->controller(FavoriteComicController::class)->group(function(){
    Route::get('/getAllComicsFavorites','getAllComicsFavorites');
    Route::post('/storeOrChoiseComicFavorite','storeOrChoiseComicFavorite');
});    