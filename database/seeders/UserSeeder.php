<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Fahd.Abuoolila',
            'email' => 'fahdabuoolila.px@gmail.com',
            'password' => Hash::make('123@Fahd'),
            'ability' => 'true',
            'job' => 'Backend Developer',
            'active' => 'true',
        ]);
    }
}
