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
                'description' =>"Adverten is a smartlink technology which provides high performance monetization of dating traffic. \r\n\r\n<br><br>Our special features:\r\n<br>* 150+ countries covered   \r\n<br>* proven CR funnels for each type of traffic   \r\n<br>* automatic and semi-automatic optimization\r\n<br>* constantly updated landing pages (HANDCRAFTED)   \r\n<br>* fast qualified support\r\n<br>* dedicated affiliate manager. \r\n\r\n<br><br>Forget about all the aspects of optimizing your campaigns - save your time with us! \r\n\r\n<br><br>Let’s rock the profit together",
                'referral_commissione' => 3,
                'minimum_payment' => 100,
                'payment_method_id' => 2,
                'payment_frequency_id' => 1,
                'tracking_software_id' => 3,
                'category_id' => 1
            ],
            [
                'name' => 'DmsAffiliates',
                'link' => 'https://adverten.com/en/?utm_source=referral&utm_medium=forum&utm_campaign=affplus',
                'link_banner' => 'https://apimg.net/networks/profile_banner/1d8f6ac7-a9af-490b-b8af-c441653731a5.png',
                'link_offer' => 'https://www.affplus.com/n/adverten',
                'api' => 'https://api.affplus.com/v1/entity/dmsaffiliates',
                'description'=>"DMSAffiliates is with over 2.000 offers available, the #1 fit for your traffic.\r\n\r\n<br><br>By covering more than 150 GEOs within the following verticals: Dating, Gambling, Crypto, Sweepstakes, VOD, Bizop, Email-Submits & Pin-Submits - they make sure your traffic is monetized the best way possible.\r\n\r\n<br><br>DMSAffiliates is the perfect match for you, if you're looking to scale fast. They will make sure your cashflow is always on track with their unique \"Daily payments\" & \"Payments on request\" model. If you're not eligible for these specific models yet, don't be sad - weekly payments are available for anyone earning more than $250 per week.\r\n\r\n<br><br>Besides all advantages already mentioned earlier, DMSAffiliates also offers a points program, where every USD earned results into 1 DMS Point. DMS Points can be used to redeem rewards like: iPads, Macbooks, iPhones and even very exclusive Rolex watches.",
                'referral_commissione' => 3,
                'minimum_payment' => 100,
                'payment_method_id' => 2,
                'payment_frequency_id' => 1,
                'tracking_software_id' => 3,
                'category_id' => 3
            ],
            [
                'name' => 'AdsEmpire',
                'link' => 'https://adverten.com/en/?utm_source=referral&utm_medium=forum&utm_campaign=affplus',
                'link_banner' => 'https://apimg.net/networks/profile_banner/1d8f6ac7-a9af-490b-b8af-c441653731a5.png',
                'link_offer' => 'https://www.affplus.com/n/adverten',
                'api' => 'https://api.affplus.com/v1/entity/adsempire',
                'description'=>"AdsEmpire is a reliable affiliate network with exclusive dating offers from direct advertisers, Smartlink solution, and global GEO coverage.\r\n\r\n<br><br>Some significant benefits and advanced features which are a must-try for the affiliates:\r\n<br>- Huge number of Dating Exclusive offers\r\n<br>- Advanced Smartlink Technology to monetize 100% of your traffiс\r\n<br>- CPL (SOI, DOI), PPS, and RevShare payout models\r\n<br>- Highest payouts on the market and great EPC\r\n<br>- Experienced team of affiliate managers with deep expertise in dating\r\n<br>- Weekly/Monthly payouts from $250\r\n<br>- Worldwide availability (over 50 countries are supported!) with a focus on Tier1 and Europe\r\n<br>- The most comfortable payment methods for you: Wire, Paypal, Paxum, Bitcoin, Paysera, Genome\r\n\r\n<br><br>Moreover, AdsEmpire often sponsors various meetups and conferences, organizes private parties for top partners, contests with cool prizes, promotions, and payout boosts.\r\n\r\n<br><br><a href=\"https://adsempire.com/?utm_source=affpaying\" rel=\"nofollow\" target=\"_blank\">Start to earn in the most durable niche with AdsEmpire!</a>",
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
