<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Redis;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listReviews = Review::all();
        return response()->json($listReviews);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = Review::create([
            'score' => $request->score,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'website_id' => $request->websiteId || 1,
            'offer' => $request->rating['offers'],
            'payout' => $request->rating['payout'],
            'tracking' => $request->rating['tracking'],
            'support' => $request->rating['support']
        ]);

        return response()->json([
            'status' => 200,
            'data' => $review
        ]);
    }

    // public function getReviewById(Request $request, Review $review)
    // {
    //     $review = Review::('');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
