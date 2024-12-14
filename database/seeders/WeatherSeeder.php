<?php

namespace Database\Seeders;

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
        $this->command->getOutput()->info('[0] Automatsko generiši podatke ili [1] Upis podataka');
        $izbor = $this->command->ask("Želite li vi upisati podatke ili da se sami generišu");

        if ($izbor === '1') {
            $grad = $this->command->ask('Unesite grad');
            if ($grad === null) {
                $this->command->getOutput()->error('Niste unijeli grad');
            } elseif (Weather::all()->where('city', $grad)->count() > 0) {
                $this->command->getOutput()->info('Grad ' . $grad . ' se vec nalazi u bazi podataka');
                return;
            } else {
                $this->command->getOutput()->info('Grad je ' . $grad);
            }

            $temperature = $this->command->ask('Unesite temperature');
            if ($temperature === null) {
                $this->command->getOutput()->error('Niste unijeli temperature');
            } else {
                $this->command->getOutput()->info('Temperature su ' . $temperature);

                if (Weather::all()->where('city', $grad)->count() > 0) {

                    $this->command->getOutput()->info('Grad ' . $grad . ' se vec nalazi u bazi podataka');
                    return;
                } else {
                    Weather::create([
                        'city' => $grad,
                        'temperature' => $temperature
                    ]);
                }

                $this->command->getOutput()->info('Grad je uspjesno dodan');
            }
        } else {
            $faker = Factory::create("HR_HR");

            $brojGradova = $this->command->ask('Unesite broj gradova', 5);

            for ($i = 0; $i < $brojGradova; $i++) {
                $grad = $faker->city;
                $temperature = $faker->numberBetween(0, 50);

                if (Weather::all()->where('city', $grad)->count() > 0) {

                    $this->command->getOutput()->info('Grad ' . $grad . ' se vec nalazi u bazi podataka');
                    continue;
                } else {
                    Weather::create([
                        'city' => $grad,
                        'temperature' => $temperature
                    ]);
                }
            }
            $this->command->getOutput()->info('Uspješno generirano ' . $brojGradova . ' gradova');

        }

    }
}
