<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('/{post}', 'PostController@show');
    Route::put('/{post}', 'PostController@update');
    Route::delete('/{post}', 'PostController@destroy');

    Route::prefix('{post}/comments')->group(function () {
        Route::get('/', 'CommentController@index');
        Route::post('/', 'CommentController@store')->middleware('auth:sanctum');
        Route::delete('/{comment}', 'CommentController@destroy')->middleware('auth:sanctum');
    });

    Route::prefix('{post}/likes')->group(function () {
        Route::post('/', 'LikeController@store')->middleware('auth:sanctum');
        Route::delete('/', 'LikeController@destroy')->middleware('auth:sanctum');
    });
});
});

