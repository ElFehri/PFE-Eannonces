<?php

namespace Database\Seeders;

use App\Models\Annonce;
use App\Models\Information;
use App\Models\Publication;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $users = User::where('authorized', true)->get();

        foreach ($users as $user) {
            for ($i = 0; $i < 3; $i++) {
                $validated = $faker->randomElement([-1, 0, 1]); //[-1: rejected, 0: In review, 1: validated]
                if ($validated == 0 || $validated == -1) {
                    $masked = true;
                }
                else{
                    $masked = false;
                }
                $publication = Publication::create([
                    'start_date' => $faker->dateTimeBetween('-1 week', '+1 week'),
                    'end_date' => $faker->dateTimeBetween('+1 week', '+3 weeks'),
                    'user_id' => $user->id,
                    'Masked' => $masked,
                    'Validated' => $validated,
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