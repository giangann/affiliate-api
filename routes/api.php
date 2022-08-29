<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'auth:api'
], function () {

    Route::apiResources([
        'websites' => WebsiteController::class,
        'reviews' => ReviewController::class
    ]);

    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('interaction/getInteractionByIdReview', [InteractionController::class, 'getListByIdReview']);
    Route::post('like/like', [LikeController::class, 'like']);
    Route::post('interaction/replyContent', [InteractionController::class, 'replyContent']);
});

Route::get('websites', [WebsiteController::class, 'index']);
Route::get('reviews', [ReviewController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/get-google-sign-in-url', [\App\Http\Controllers\Api\GoogleController::class, 'getGoogleSignInUrl']);
Route::get('/google/callback', [\App\Http\Controllers\Api\GoogleController::class, 'loginCallback']);