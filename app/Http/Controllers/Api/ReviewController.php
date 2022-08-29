<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Like;
use Illuminate\Support\Facades\Redis;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listReviews = Review::where('website_id', $request->websiteId)->get();

        foreach ($listReviews as $review) {
            $review->totalDislike = $review->likes()->where('is_like', Like::STATUS_LIKE['DISLIKE'])->count();
            $review->totalLike = $review->likes()->where('is_like', Like::STATUS_LIKE['LIKE'])->count();
            $review->rating = [
                'offer' => $review->offer,
                'tracking' => $review->tracking,
                'payout' => $review->payout,
                'support' => $review->support
            ];
            if (!empty(auth()->user())) {
                $review->is_liked = $review->likes()->where('user_id', auth()->user()->id)->get()->is_like;
            }    
        }
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
            'offer' => $request->offer,
            'payout' => $request->payout,
            'tracking' => $request->tracking,
            'support' => $request->support
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

        $review = Review::find($id);
        $this->model = new Review();
        $request->only($this->model->getFillable());

        $review->update($request->only($this->model->getFillable()));
        $review->save();

        return response()->json([
            'status' => 200,
            'data' => $review
        ]);
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
