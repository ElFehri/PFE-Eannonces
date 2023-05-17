<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Annonce;
use App\Models\Publication;
use Faker\Factory as Faker;

class AnnoncesTableSeeder extends Seeder
{
    public function run()
    {
/*         $faker = Faker::create();

        $publications = Publication::where('type', 'Annonce')->get();

        foreach ($publications as $publication) {
            Annonce::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'pub_id' => $publication->id,
            ]);
        } */
    }
}
