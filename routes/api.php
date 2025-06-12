<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {

    Route::post('register', [JWTAuthController::class, 'register']);

    Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('{post}', [PostController::class, 'show']);
    Route::put('{post}', [PostController::class, 'update']);
    Route::delete('{post}', [PostController::class, 'destroy']);
    });

    Route::prefix('comments')->group(function () {
        Route::post('/', [CommentController::class, 'store']);
        Route::delete('{comment}', [CommentController::class, 'destroy']);
    });

    Route::prefix('likes')->group(function () {
        Route::post('/', [LikeController::class, 'store']);
        Route::delete('{likes}', [LikeController::class, 'destroy']);
    });

    Route::prefix('messages')->group(function () {
        Route::post('/', [MessageController::class, 'store']);
        Route::get('{messages}', [MessageController::class, 'show']);
        Route::get('/getMessage/{user_id}', [MessageController::class, 'getMessagesByUser']);
        Route::delete('{messages}', [MessageController::class, 'destroy']);
    });
});

