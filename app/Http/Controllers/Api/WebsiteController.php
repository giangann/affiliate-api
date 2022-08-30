<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listWebsites = Website::all();

        foreach ($listWebsites as $w) {
            $w->reviews;
        }

        return response()->json($listWebsites);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->model = new Website();
        $website = Website::create($request->only($this->model->getFillable()));
        return response()->json([
            'status' => 200,
            'data' => $website
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Website::where('id', $id)->first();
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        $this->model = new Website();
        $website->update($request->only($this->model->getFillable()));
        $website->save();
        return response()->json([
            'status' => 200,
            'data' => $website
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getBySlug($slug)
    {
        $website = Website::where()->first();
    }

    public function top10()
    {
        $websites = Website::all();

        foreach ($websites as $website) {
            $website->reviews;

            $sumScore = 0;

            foreach ($website->reviews as $review) {
                $sumScore += $review->score;
            }

            $website->aveScore = $sumScore / count($website->reviews);
        }

        $sorted = $websites->sortByDesc('aveScore');

        return array_slice($sorted->values()->all(), 0, 10);
    }
}

