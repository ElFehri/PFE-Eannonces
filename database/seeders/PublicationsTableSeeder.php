<?php

namespace Database\Seeders;

use App\Models\Annonce;
use App\Models\Information;
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
                $publication = Publication::create([
                    'start_date' => $faker->dateTimeBetween('-1 week', '+1 week'),
                    'end_date' => $faker->dateTimeBetween('+1 week', '+3 weeks'),
                    'user_id' => $user->id,
                ]);

                if ($faker->boolean(50)) {
                    Annonce::create([
                        'title' => $faker->sentence,
                        'content' => $faker->paragraph,
                        'pub_id' => $publication->id,
                    ]);
                } else {
                    Information::create([
                        'content' => $faker->sentence,
                        'pub_id' => $publication->id,
                    ]);
                }
            }
        }
    }

}
