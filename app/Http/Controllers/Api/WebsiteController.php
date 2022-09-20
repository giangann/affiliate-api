<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\User;
use App\Models\ReviewRemain;
use App\Models\PaymentMethod;
use App\Models\PaymentFrequencies;
use App\Models\TrackingSoftware;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $this->model = new Website();
        $data = $request->only($this->model->getFillable());
        $listWebsites = Website::where($data)->search($keyword)->get();

        if (!$keyword) {
            foreach ($listWebsites as $website) {
                $website->reviews;

                $sumScore = 0;

                foreach ($website->reviews as $review) {
                    $sumScore += $review->score;
                }
                if ($website->reviews->count()) {
                    $website->aveScore = $sumScore / $website->reviews->count();
                }
                $website->avg_offer = $website->reviews()->pluck('offer')->avg();
                $website->avg_tracking = $website->reviews()->pluck('tracking')->avg();
                $website->avg_payout = $website->reviews()->pluck('payout')->avg();
                $website->avg_support = $website->reviews()->pluck('support')->avg();
            }
        }

        $per_page = $request->per_page;
        $page = $request->page;

        if (isset($per_page) && isset($page) && $per_page != -1) {
            return $this->paginateData($listWebsites, $per_page, $page);
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
        // foreach ($request->payment_frequency_arr as $value) {
        //     # code...
        //     if(PaymentFrequencies::where('name',$value)->doesntExist()){
        //         PaymentFrequencies::create(['name'=>$value]);
        //     }
        // }

        // foreach ($request->tracking_software_arr as $value) {
        //     # code...
        //     if(TrackingSoftware::where('name',$value)->doesntExist()){
        //         TrackingSoftware::create(['name'=>$value]);
        //     }
        // }

        // foreach ($request->payment_method_arr as $value) {
        //     # code...
        //     if(PaymentMethod::where('name',$value)->doesntExist()){
        //         PaymentMethod::create(['name'=>$value]);
        //     }
        // }

        // $request->payment_frequency = collect($request->payment_frequency)->implode(', ');
        // $request->tracking_software = collect($request->tracking_software)->implode(', ');
        // var_dump($request);

        if ($request->is_network_of_the_month === Website::IS_NETWORK_OF_THE_MONTH['YES']) {
            Website::where('is_network_of_the_month', Website::IS_NETWORK_OF_THE_MONTH['YES'])->first()
                ->update(['is_network_of_the_month' => Website::IS_NETWORK_OF_THE_MONTH['NO']]);
        }

        $this->model = new Website();
        $website = Website::create($request->only($this->model->getFillable()));
        // user can write 5 review for each website (in 1 day)
        $allUsers = User::all();
        foreach($allUsers as $user){
            ReviewRemain::create(
                [
                    'user_id'=>$user->id,
                    'website_id'=>$website->id,
                    'reviews_remain'=>5
                ]
            );
        }
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
    public function show(Request $request, $id)
    {
        $website = Website::where('id', $id)->with(['category'])->first();
        if (!empty($website)) {
            $sumScore = 0;

            foreach ($website->reviews as $review) {
                $sumScore += $review->score;
            }

            if ($website->reviews->count()) {
                $website->aveScore = $sumScore / $website->reviews->count();
            }
            $website->avg_offer = $website->reviews()->pluck('offer')->avg();
            $website->avg_tracking = $website->reviews()->pluck('tracking')->avg();
            $website->avg_payout = $website->reviews()->pluck('payout')->avg();
            $website->avg_support = $website->reviews()->pluck('support')->avg();
            $website->reviews_remain = ReviewRemain::where([['user_id',$request->userId],['website_id',$id]])->first()->reviews_remain??0;
            return $website;
        }
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
        if ($request->is_network_of_the_month === Website::IS_NETWORK_OF_THE_MONTH['YES']) {
            Website::where('is_network_of_the_month', Website::IS_NETWORK_OF_THE_MONTH['YES'])->first()
                ->update(['is_network_of_the_month' => Website::IS_NETWORK_OF_THE_MONTH['NO']]);
        }

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
        return Website::where('id', $id)->delete();
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
            if ($website->reviews->count()) {
                $website->aveScore = $sumScore / $website->reviews->count();
            }

            $website->avg_offer = $website->reviews()->pluck('offer')->avg();
            $website->avg_tracking = $website->reviews()->pluck('tracking')->avg();
            $website->avg_payout = $website->reviews()->pluck('payout')->avg();
            $website->avg_support = $website->reviews()->pluck('support')->avg();
        }

        $sorted = $websites->sortByDesc('aveScore');

        return array_slice($sorted->values()->all(), 0, 10);
    }

    public function getByCategoryId(Request $request)
    {
        $websites = Website::where('category_id', $request->category_id)->with(['reviews'])->orderBy('created_at', 'desc')->get();

        $per_page = $request->per_page;
        $page = $request->page;

        if (isset($per_page) && isset($page) && $per_page != -1) {
            return $this->paginateData($websites, $per_page, $page);
        }

        return response()->json($websites);
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

    public function featureNetwork(Request $request)
    {
        $listWebsiteId = Review::groupBy('website_id')
            ->selectRaw('count(*) as total, website_id')->orderBy('total', 'desc')
            ->get(['count(*), website_id'])->toArray();

        $featuresNetwork = [];
        foreach ($listWebsiteId as $item) {
            $website = Website::find($item['website_id'])->toArray();
            array_push($featuresNetwork, $website);
        }

        return response()->json($featuresNetwork);
    }
    public function allFilter(){
        $allFilter = new stdClass();

        $allFilter->payment_method = PaymentMethod::all();
        $allFilter->payment_frequencies = PaymentFrequencies::all();
        $allFilter->tracking_software = TrackingSoftware::all();

        return $allFilter;
    }

    public function getNetworkOfTheMonth()
    {

        $website = Website::where('is_network_of_the_month', Website::IS_NETWORK_OF_THE_MONTH['YES'])->first();

        $sumScore = 0;

        foreach ($website->reviews as $review) {
            $sumScore += $review->score;
        }
        if ($website->reviews->count()) {
            $website->aveScore = $sumScore / $website->reviews->count();
        }

        $website->avg_offer = $website->reviews()->pluck('offer')->avg();
        $website->avg_tracking = $website->reviews()->pluck('tracking')->avg();
        $website->avg_payout = $website->reviews()->pluck('payout')->avg();
        $website->avg_support = $website->reviews()->pluck('support')->avg();

        return $website;
    }
}
