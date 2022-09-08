<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interaction;

class InteractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getListByIdReview(Request $request)
    {
        $listInteraction = Interaction::where('review_id', $request->reviewId)->get();
        foreach ($listInteraction as $interaction){
            $interaction->user = $interaction->user()->where('id',$interaction->user_id)->first();
        }
        // dd($listInteraction);
        return response()->json([
            'status' => 200,
            'data' => $listInteraction
        ]);
    }

    public function replyContent(Request $request)
    {
        $interaction = 0;
        if ($request->interactionId == 0) {
            $interaction = Interaction::create([
                'review_id' => $request->reviewId,
                'user_id' => auth()->user()->id,
                'is_like' => null,
                'reply_content' => $request->replyContent,
            ]);
        } else {
            $interaction = Interaction::find($request->interactionId);
            $interaction->update([
                'reply_content' => $request->replyContent,
            ]);
            $interaction->save();
        }

        return response()->json([
            'status' => 200,
            'data' => $interaction
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
        $interaction = Interaction::find($id)->delete();
        // dd($interaction);
        return response()->json([
            'status' => 200,
            'data' => $interaction
        ]);
    }
}
