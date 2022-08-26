<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('payment_frequencies')->insert([
            [
                'name'=>'Weekly'
            ],
            [
                'name'=>'Monthly'
            ],
            [
                'name'=>'Daily'
            ]
            ]);
    }
}
