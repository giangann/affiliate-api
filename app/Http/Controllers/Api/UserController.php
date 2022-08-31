<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me()
    {
        return response()->json([
            'status' => 200,
            'data' => auth()->user()
        ]);
    }
}
