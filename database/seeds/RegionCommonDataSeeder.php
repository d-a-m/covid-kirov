<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RegionCommonDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker();

        for ($i = 1; $i < 31; $i++) {
            \App\Models\RegionCommonData::create([
                'date' => \Carbon\Carbon::now()->subDays($i),
                'infected' => $i * 100,
                'recovered' => $i * 10,
                'died' => $i,
                'tested' => $i * 1000,
                'isolated' => $i * 50,
            ]);
        }
    }
}
