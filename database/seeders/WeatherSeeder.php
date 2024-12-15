<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Weather;
use Faker\Factory;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create();

        $cities = City::all();

        foreach ($cities as $city){
            for ($i = 0; $i < 5; $i++) {
                Weather::create([
                    'city_id' => $city->id,
                    'temperature' => $faker->numberBetween(15, 30),
                ]);
            }
        }

    }
}
