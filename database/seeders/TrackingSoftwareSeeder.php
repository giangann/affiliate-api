<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackingSoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tracking_software')->insert([
            [
                'name'=>'In-house'
            ],
            [
                'name'=>'CAKE'
            ],
            [
                'name'=>'Afftrack'
            ]
            ]);

    }
}
