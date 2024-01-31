<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('lt_LT');

        foreach (range(1, 20) as $i) {
            DB::table('mechanics')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
            ]);
        }

        foreach (range(1, 100) as $i) {

            $trucksModels = [
                'Volvo',
                'Man',
                'Scania',
                'Mercedes',
                'Iveco',
                'Renault',
                'DAF',
                'Mitsubishi',
            ];

            DB::table('trucks')->insert([
                'brand' => $faker->randomElement($trucksModels),
                'plate' => $faker->regexify('[A-Z]{3}-[0-9]{3}'),
                'mechanic_id' => $faker->numberBetween(1, 20),
            ]);
        }
        
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
