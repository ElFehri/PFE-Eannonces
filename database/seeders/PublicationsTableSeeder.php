<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publication;
use App\Models\User;
use Faker\Factory as Faker;


class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::where('authorized', true)->get();

        foreach ($users as $user) {
            for ($i = 0; $i < 3; $i++) {
                Publication::create([
                    'type' => $faker->randomElement(['Annonce', 'Information']),
                    'start_date' => $faker->dateTimeBetween('-1 month', '+1 month'),
                    'end_date' => $faker->dateTimeBetween('+1 month', '+3 months'),
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
