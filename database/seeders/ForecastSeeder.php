<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Forecast;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{

    public function run(): void
    {
        $cities = City::all();

        foreach ($cities as $city){
            for ($i = 0; $i < 5; $i++) {

            $temp = $this->tempCheck($i, $city->id);
            $weather_type = $this->weatherTypeCheck($temp);

                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => $temp,
                    'date' => $this->getDate($i),
                    'weather_type'=> $weather_type,
                    'probability' => $this->probability($weather_type),
                ]);
            }
        }
    }
    public function tempCheck($i, $city_id){

        $faker = Factory::create();
        $temperature = null;

        if ($i == 0) {
            $temperature = $faker->numberBetween(-30, 50);
        }else{
            $lastTemp = Forecast::orderBy('id', 'desc')->where('city_id', $city_id)->first();
            $temperature = $lastTemp->temperature + $faker->numberBetween(-5, 5);
        }

        return $temperature;

    }

    private function weatherTypeCheck($temp)
    {
        $weather_options = [];

        if ($temp <= -10) {
            $weather_options = ['rainy', 'sunny'];
        } elseif ($temp > -10 && $temp <= 1) {
            $weather_options = ['snowy', 'sunny'];
        } elseif ($temp > 1 && $temp <= 15) {
            $weather_options = ['cloudy', 'sunny'];
        } else {
            $weather_options = ['sunny'];
        }


        return $weather_options[array_rand($weather_options)];
    }

    private function probability($weather_type)
    {

        if ($weather_type != 'sunny') {
            return rand(0, 100);
        }
            return null;
    }

    private function getDate(int $i)
    {
       return Carbon::now()->addDays($i)->format('d-m-Y');
    }


}
