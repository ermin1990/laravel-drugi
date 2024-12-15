<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Forecast;
use Carbon\Carbon;
use Faker\Factory;
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

        $weather_types = ['sunny', 'rainy', 'snowy'];

        foreach ($cities as $city){
            for ($i = 0; $i < 5; $i++) {
                $weather_type = $faker->randomElement($weather_types);
                if ($weather_type != 'sunny') {
                    $probability = rand(0, 100);
                }else{
                    $probability = null;
                }
                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => $faker->numberBetween(15, 30),
                    'date' => Carbon::now()->addDays(rand(1,30)),
                    'weather_type'=> $weather_type,
                    'probability' => $probability
                ]);
            }
        }

    }
}
