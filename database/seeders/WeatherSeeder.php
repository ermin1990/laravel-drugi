<?php

namespace Database\Seeders;

use App\Models\Weather;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grad = $this->command->ask('Unesite grad');
        if ($grad === null){
            $this->command->getOutput()->error('Niste unijeli grad');
        } else {
            $this->command->getOutput()->info('Grad je ' . $grad);
        }

        $temperature = $this->command->ask('Unesite temperature');
        if ($temperature === null){
            $this->command->getOutput()->error('Niste unijeli temperature');
        } else {
            $this->command->getOutput()->info('Temperature su ' . $temperature);
        }

        Weather::create([
            'city' => $grad,
            'temperature' => $temperature
        ]);

        $this->command->getOutput()->info('Uspješno unešen grad ' . $grad . ' i temperature ' . $temperature.'°C');
    }
}
