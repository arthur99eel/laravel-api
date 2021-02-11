<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\VerificationController;
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




Route::get('/email/resend', [VerificationController::class,'resend'])->middleware(['auth:api', 'throttle:6,1'])->name('verificationapi.resend');

Route::get('/email/verify/{id}', [VerificationController::class,'verify'])->middleware(['auth:api','signed'])->name('verificationapi.verify');

Route::get('/login',[LoginController::class,'login'])->name('login');

Route::post('users',[UserController::class,'register']);

Route::middleware('auth:api')->apiResource('users.posts', UserPostsController::class);

Route::middleware('auth:api')->apiResource('post.comments', PostCommentsController::class);

Route::resource('users', UserController::class)->except(['store','create','edit']);

Route::middleware(['auth:api','verified'])->apiResource('posts', PostController::class);

Route::middleware('auth:api')->apiResource('comments', CommentController::class);

Route::middleware('auth:api')->apiResource('spaces', SpaceController::class);

Route::middleware('auth:api')->apiResource('questions', QuestionController::class);

Route::middleware('auth:api')->apiResource('answers', AnswerController::class);