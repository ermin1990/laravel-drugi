<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $amout = $this->command->ask('Koliko korisnika želite dodati', 10);

        $password = $this->command->ask('Unesite lozinku', '12345678');

        $faker = Faker::create("HR_HR");

        $this->command->getOutput()->progressStart($amout);

        for($i = 0; $i < $amout; $i++) {
            User::create([
                'name'=> $faker->name,
                "email" => $faker->email,
                "password" => Hash::make($password),
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
