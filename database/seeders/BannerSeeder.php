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
                'path_to_website'=>'https://adsterra.com/cpanetwork/?utm_source=affpaying&utm_medium=pr&utm_campaign=cpa_affiliate_case_0922&utm_content=affiliate_case0922',
                'type'=>1
            ],
            [
                'link_of_image'=>'https://apimg.net/slider/highrockads-slider.png',
                'path_to_website'=>'https://publishers.highrockads.com/v2/sign/up',
                'type'=>1
            ],
            [
                'link_of_image'=>'https://apimg.net/slider/1xbetpartners546x234.jpg',
                'path_to_website'=>'https://1xpartners.com/sign-up?tag=d_1427065m_2387c_subaffart',
                'type'=>1
            ],
            [
                'link_of_image'=>'https://apimg.net/slider/howto-setup-tracker-mylead-546x234.jpg',
                'path_to_website'=>'https://mylead.global/en/register?utm_source=affpaying.com&utm_medium=Content-marketing&utm_campaign=wsp%C3%B3%C5%82praca-artyku%C5%82&utm_content=EN',
                'type'=>1
            ],
            [
                'link_of_image'=>'https://apimg.net/slider/n1-partners-2022-2.jpg',
                'path_to_website'=>'https://n1.partners/?utm_campaign=Affpaying&utm_medium=N1_Partners&utm_source=affil_prog',
                'type'=>1
            ],
            [
                'link_of_image'=>'https://apimg.net/2020/Affpaying%20125x125.gif',
                'path_to_website'=>'https://evadav.com/',
                'type'=>3
            ],[
                'link_of_image'=>'https://apimg.net/2020/affmine-125x125.gif',
                'path_to_website'=>'https://www.affmine.com/?utm_source=affpaying&utm_medium=banner',
                'type'=>3
            ],[
                'link_of_image'=>'https://apimg.net/2022/lemonad_easy_peasy_300x250.gif',
                'path_to_website'=>'https://limonad.com/en/?utm_source=affpaying2',
                'type'=>2
            ],

        ]);
    }
}
