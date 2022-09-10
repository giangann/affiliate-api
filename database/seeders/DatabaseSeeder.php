<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PaymentMethodSeeder::class);
        $this->call(PaymentFrequencySeeder::class);
        $this->call(TrackingSoftwareSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CriteriaSeeder::class);
        $this->call(WebsiteSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(InteractionSeeder::class);
        $this->call(ReviewRemainSeeder::class);
    }
}
