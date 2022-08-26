<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('criterias')->insert([
            [
                'name'=>'Offer',
                'max_score'=>5,
                'min_score'=>0
            ],
            [
                'name'=>'Payout',
                'max_score'=>5,
                'min_score'=>0
            ],
            [
                'name'=>'Tracking',
                'max_score'=>5,
                'min_score'=>0
            ],
            [
                'name'=>'Support',
                'max_score'=>5,
                'min_score'=>0
            ]
        ]);
    }
}
