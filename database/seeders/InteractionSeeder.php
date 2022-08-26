<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('interactions')->insert([
            [
                'is_like'=>true,
                'reply_content'=>'Amazing, its really greate',
                'review_id'=>1,
                'user_id'=>2
            ]
            ]);
    }
}
