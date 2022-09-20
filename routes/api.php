<?php

namespace App\Http\Controllers\Api;

use App\Models\PaymentMethod;
use App\Models\TrackingSoftware;
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
Route::get('websites/getByCategoryId', [WebsiteController::class, 'getByCategoryId']);

Route::apiResources([
    'categories' => CategoryController::class,
    'payment_frequencies' => PaymentFrequencyController::class,
    'tracking_software' => TrackingSoftwareController::class,
    'payment_method' => PaymentMethodController::class,
    'banners'=> BannerController::class,
]);

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('users/me', [UserController::class, 'me']);
    Route::get('websites/getNetworkOfTheMonth', [WebsiteController::class, 'getNetworkOfTheMonth']);
   Route::apiResources([
       'websites' => WebsiteController::class,
       'reviews' => ReviewController::class,
   ]);
    Route::get('reviews', [ReviewController::class, 'index']);


    Route::post('/logout', [LoginController::class, 'logout']);

    Route::post('like/like', [LikeController::class, 'like']);
    Route::post('interaction/replyContent', [InteractionController::class, 'replyContent']);
    Route::delete('interaction/{id}', [InteractionController::class, 'destroy']);

});
Route::get('interaction/getInteractionByIdReview', [InteractionController::class, 'getListByIdReview']);

Route::get('websites', [WebsiteController::class, 'index']);
Route::get('websites-top-10', [WebsiteController::class, 'top10']);
Route::get('websites/show/{id}', [WebsiteController::class, 'show']);

Route::get('reviews', [ReviewController::class, 'index']);
Route::get('reviews-recent', [ReviewController::class, 'getRecentReviews']);
Route::post('/login', [LoginController::class, 'login']);

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login-with-google', [\App\Http\Controllers\Api\GoogleController::class, 'loginWithGoogle']);
Route::get('/websites-feature-network', [WebsiteController::class, 'featureNetwork']);
Route::get('all_filter', [WebsiteController::class, 'allFilter']);
