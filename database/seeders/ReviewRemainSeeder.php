<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReviewRemainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('review_remains')->insert([
            [
                'website_id'=>1,
                'user_id' =>1,
                'reviews_remain'=>4
            ],
            [
                'website_id'=>1,
                'user_id' =>2,
                'reviews_remain'=>5
            ],
            [
                'website_id'=>2,
                'user_id' =>1,
                'reviews_remain'=>5
            ],
            [
                'website_id'=>2,
                'user_id' =>2,
                'reviews_remain'=>5
            ],
            [
                'website_id'=>3,
                'user_id' =>1,
                'reviews_remain'=>5
            ],
            [
                'website_id'=>3,
                'user_id' =>2,
                'reviews_remain'=>5
            ],
        ]);
    }
}
