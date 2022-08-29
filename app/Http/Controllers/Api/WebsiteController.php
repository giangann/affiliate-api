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
        return response()->json($listWebsites);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->model = new Website();
        $website = Website::create($request->only($this->model->getFillable()));
        return response()->json([
            'status'=>200,
            'data' => $website
        ])
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
    public function update(Request $request, Website $id)
    {
        $this->model = new Website();
        $website->update($request->only($this->model->getFillable()));
        $website->save();
        return response()->json([
            'status'=>200,
            'data' => $website
        ])
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
