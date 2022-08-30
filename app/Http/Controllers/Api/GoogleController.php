<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    public function loginWithGoogle(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            $user = User::create(
                [
                    'email' => $request->email,
                    'name' => $request->name,
                    'google_id' => $request->id,
                    'password' => '123',
                ]
            );
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
