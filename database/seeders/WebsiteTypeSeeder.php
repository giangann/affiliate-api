<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_types')->insert([
            [
                'name'=>'Premium Network',
            ],
            [
                'name'=>'Affiliate Program',
            ],
            [
                'name'=>'Advertising Network',
            ]
        ]);
    }
}
