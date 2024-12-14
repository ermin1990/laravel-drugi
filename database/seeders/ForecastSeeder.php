<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Forecast;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
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
                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => $faker->numberBetween(0, 40),
                    'date' => $faker->date,
                ]);
            }
        }

    }
}
