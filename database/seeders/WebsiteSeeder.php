<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            [
                'name' => 'Adverten',
                'link' => 'https://adverten.com/en/?utm_source=referral&utm_medium=forum&utm_campaign=affplus',
                'link_banner' => 'https://apimg.net/networks/profile_banner/1d8f6ac7-a9af-490b-b8af-c441653731a5.png',
                'link_offer' => 'https://www.affplus.com/n/adverten',
                'api' => 'https://api.affplus.com/v1/entity/adverten',
                'referral_commissione' => 3,
                'minimum_payment' => 100,
                'payment_method_id' => 2,
                'payment_frequency_id' => 1,
                'tracking_software_id' => 3,
                'category_id' => 1
            ],
            [
                'name' => 'TEST 2',
                'link' => 'https://adverten.com/en/?utm_source=referral&utm_medium=forum&utm_campaign=affplus',
                'link_banner' => 'https://apimg.net/networks/profile_banner/1d8f6ac7-a9af-490b-b8af-c441653731a5.png',
                'link_offer' => 'https://www.affplus.com/n/adverten',
                'api' => 'https://api.affplus.com/v1/entity/dmsaffiliates',
                'referral_commissione' => 3,
                'minimum_payment' => 100,
                'payment_method_id' => 2,
                'payment_frequency_id' => 1,
                'tracking_software_id' => 3,
                'category_id' => 3
            ],
            [
                'name' => 'Bao 123321',
                'link' => 'https://adverten.com/en/?utm_source=referral&utm_medium=forum&utm_campaign=affplus',
                'link_banner' => 'https://apimg.net/networks/profile_banner/1d8f6ac7-a9af-490b-b8af-c441653731a5.png',
                'link_offer' => 'https://www.affplus.com/n/adverten',
                'api' => 'https://api.affplus.com/v1/entity/adsempire',
                'referral_commissione' => 3,
                'minimum_payment' => 50,
                'payment_method_id' => 1,
                'payment_frequency_id' => 1,
                'tracking_software_id' => 1,
                'category_id' => 2
            ],
        ]);
    }
}
