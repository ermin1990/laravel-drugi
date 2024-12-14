<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {

        $this->command->getOutput()->info('[0] Automatsko generiši podatke ili [1] Upis podataka');
        $izbor = $this->command->ask("Želite li vi upisati podatke ili da se sami generišu");

        $amout = $this->command->ask('Koliko korisnika želite dodati', 10);

        if ($izbor === '0') {
            $this->command->getOutput()->info('Automatsko generiši podatke');

            $faker = Faker::create("HR_HR");

            for ($i = 0; $i < $amout; $i++) {
                $name = $faker->name;
                $email = $faker->email;
                $password = $faker->password;

                if (User::all()->where('email', $email)->count() > 0) {
                    $this->command->getOutput()->info('Korisnik ' . $email . ' se vec nalazi u bazi podataka');
                    continue;
                }

                User::create([
                    'name' => $name,
                    "email" => $email,
                    "password" => Hash::make($password),
                ]);

                $this->command->getOutput()->info('Korisnik je uspjesno dodan');
            }

        } elseif ($izbor === '1') {
            $this->command->getOutput()->info('Upis podataka');

            for ($i = 0; $i < $amout; $i++) {
                $name = $this->command->ask('Unesite ime');
                $email = $this->command->ask('Unesite email');
                $password = $this->command->ask('Unesite lozinku');

                if (User::all()->where('email', $email)->count() > 0) {
                    $this->command->getOutput()->info('Korisnik ' . $email . ' se vec nalazi u bazi podataka');
                    continue;
                }

                User::create([
                    'name' => $name,
                    "email" => $email,
                    "password" => Hash::make($password),
                ]);

                $this->command->getOutput()->info('Korisnik je uspjesno dodan');
            }
        }

    }
}
