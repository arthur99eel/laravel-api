<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostCommentsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login',[LoginController::class,'login']);
Route::post('users',[UserController::class,'register']);
Route::middleware('auth:api')->apiResource('users.posts', UserPostsController::class);
Route::middleware('auth:api')->apiResource('post.comments', PostCommentsController::class);
Route::resource('users', UserController::class)->except(['store','create','edit']);
Route::middleware('auth:api')->apiResource('posts', PostController::class);
Route::middleware('auth:api')->apiResource('comments', CommentController::class);