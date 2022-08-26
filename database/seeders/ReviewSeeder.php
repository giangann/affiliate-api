<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reviews')->insert([
            [
                'score'=>5,
                'content'=>'very greate',
                'website_id'=>1,
                'user_id'=>1,
                'criteria_id'=>2,
            ]
            ]);
    }
}
