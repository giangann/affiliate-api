<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'link_of_image'=>'https://apimg.net/slider/adsterracpa-vpncasestudy-546x234.jpg',
                'path_to_website'=>'https://adsterra.com/cpanetwork/?utm_source=affpaying&utm_medium=pr&utm_campaign=cpa_affiliate_case_0922&utm_content=affiliate_case0922'
            ],
            [
                'link_of_image'=>'https://apimg.net/slider/highrockads-slider.png',
                'path_to_website'=>'https://publishers.highrockads.com/v2/sign/up'
            ],
            [
                'link_of_image'=>'https://apimg.net/slider/1xbetpartners546x234.jpg',
                'path_to_website'=>'https://1xpartners.com/sign-up?tag=d_1427065m_2387c_subaffart'
            ],
            [
                'link_of_image'=>'https://apimg.net/slider/howto-setup-tracker-mylead-546x234.jpg',
                'path_to_website'=>'https://mylead.global/en/register?utm_source=affpaying.com&utm_medium=Content-marketing&utm_campaign=wsp%C3%B3%C5%82praca-artyku%C5%82&utm_content=EN'
            ],
            [
                'link_of_image'=>'https://apimg.net/slider/n1-partners-2022-2.jpg',
                'path_to_website'=>'https://n1.partners/?utm_campaign=Affpaying&utm_medium=N1_Partners&utm_source=affil_prog'
            ],
        ]);
    }
}
