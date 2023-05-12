<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        
        //resposable
        User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'cin' => 'CIN00',
            'role' => 'Responsable',
            'password' => Hash::make('resp1234'),
            'authorized' => true,
        ]);
        
        //admins
        for ($i = 1; $i <= 3; $i++) {
            
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'cin' => 'CIN0'.$i,
                'role' => 'Admin',
                'password' => Hash::make('admin1234'),
                'authorized' => true,
            ]);
        }

        //creating members
        $totalUsers = 6;
        $unauthorizedUsers = 2;

        for ($i = 1; $i <= $totalUsers; $i++) {
            $authorized = ($i < ($totalUsers - $unauthorizedUsers));
            
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'cin' => 'CIN00'.$i,
                'role' => 'Member',
                'password' => Hash::make('member1234'),
                'authorized' => $authorized,
            ]);
        }


       
    }
}
