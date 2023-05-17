<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Information;
use App\Models\Publication;
use Faker\Factory as Faker;


class InformationTableSeeder extends Seeder
{
    public function run()
    {
        /* $faker = Faker::create();

        $publications = Publication::where('type', 'Information')->get();

        foreach ($publications as $publication) {
            Information::create([
                'content' => $faker->sentence,
                'pub_id' => $publication->id,
            ]);
        } */
    }
}
