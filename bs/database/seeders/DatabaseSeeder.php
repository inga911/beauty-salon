<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);

        foreach([
            'Beauty Lab',
            'Touch & Care',
            'Beauty Base',
            'Dermology',
            'Dolly'
        ] as $salon_name) {
            DB::table('beauty_salons')->insert([
                'salon_name' => $salon_name,
            ]);
        }
}
}