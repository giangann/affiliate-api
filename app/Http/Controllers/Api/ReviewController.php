<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Like;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listReviews = Review::where('website_id', $request->websiteId)->orderBy('created_at', 'desc')->get();

        foreach ($listReviews as $review) {
            $review->totalDislike = $review->likes()->where('is_like', Like::STATUS_LIKE['DISLIKE'])->count();
            $review->totalLike = $review->likes()->where('is_like', Like::STATUS_LIKE['LIKE'])->count();
            $review->rating = [
                'offer' => $review->offer,
                'tracking' => $review->tracking,
                'payout' => $review->payout,
                'support' => $review->support
            ];
            // if (!empty(auth()->user())) {
//                $review->is_liked = $review->likes()->where('user_id', 1 ?? auth()->user()->id)->get()->is_like;
            // }
        }

        $per_page = $request->per_page;
        $page = $request->page;

        if (isset($per_page) && isset($page) && $per_page != -1)
        {
            return $this->paginateData($listReviews, $per_page, $page);
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
            'user_id' => 1 ?? auth()->user()->id,
            'website_id' => $request->websiteId,
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

    public function paginateData($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $paginator =  new LengthAwarePaginator($items->forPage($page, $perPage)->values()->all(), $items->count(), $perPage, $page, $options);

        $pagination = [
            "total" => $paginator->total(),
            "per_page" => (int)$perPage,
            "current_page" => $paginator->currentPage(),
            "total_pages" => $paginator->lastPage(),
        ];

        $meta = ['pagination' => $pagination];

        return response()->json([
            "data" => $paginator->items(),
            "meta" => $meta
        ]);
    }

    public function getRecentReviews()
    {
        $comments = Review::query()->with(['website'])->orderBy('created_at', 'desc');

        return $comments->simplePaginate(5);
    }
}


