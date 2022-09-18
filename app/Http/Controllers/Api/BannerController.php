<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Controllers\Controller;



class BannerController extends Controller
{
    //
    public function index(Request $request)
    {
        $type = intval($request->type);
        // dd($type);

        if ($type){
            $banners = Banner::where('type',$type)->get();
            return $banners;
        } else{
            $banners = Banner::all();
            return $banners;
        }
    }

    public function store(Request $request){
        $this->model = new Banner();
        $banner = Banner::create($request->only($this->model->getFillable()));

        return response()->json([
            'status' => 200,
            'data' => $banner
        ]);
    }

    public function update(Request $request,$id){
        $banner = Banner::find($id);
        $this->model = new Banner();

        $banner->update($request->only($this->model->getFillable()));
        $banner->save();

        return response()->json([
            'status' => 200,
            'data' => $banner
        ]);
    }

    public function destroy($id){
        $banner = Banner::find($id)->delete();

        return $banner;
    }
}
