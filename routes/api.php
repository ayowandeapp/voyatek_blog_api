<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('verify.api.token')->group(function () {
    Route::apiResource('blogs', BlogController::class);
    Route::apiResource('blogs.posts', PostController::class)->shallow();
    Route::apiResource('posts.likes', LikeController::class)->only(['store', 'destroy']);
    Route::apiResource('posts.comments', CommentController::class)->except(['index', 'show']);
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
