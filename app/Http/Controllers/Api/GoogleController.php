<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Website;
use App\Models\ReviewRemain;
use Laravel\Socialite\Facades\Socialite;
class GoogleController extends Controller
{

    public function loginWithGoogle(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        Website::query()->update(['referral_commissione'=>8]);
        if (empty($user)) {
            $user = User::create(
                [
                    'email' => $request->email,
                    'name' => $request->name,
                    'google_id' => $request->id,
                    'password' => '123',
                ]
            );

            // user can write 5 review for each website (in 1 day)
            $listWebsites = Website::all();
            foreach($listWebsites as $website){
                ReviewRemain::create(
                    [
                        'user_id'=>$user->id,
                        'website_id'=>$website->id,
                        'reviews_remain'=>5
                    ]
                );
            }
        }
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'status' => __('google sign in successful'),
            'data' => $user,
            'access_token' => $tokenResult->accessToken,
        ], Response::HTTP_CREATED);
    }
}
