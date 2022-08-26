<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebsiteController;
use App\Http\Controllers\Api\ReviewController;
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

Route::apiResources([
    'websites' => WebsiteController::class,
    'reviews' => ReviewController::class
]);

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/get-google-sign-in-url', [\App\Http\Controllers\Api\GoogleController::class, 'getGoogleSignInUrl']);