<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        user::factory()->create([
            'name' => 'Fahd.Abuoolila',
            'email' => 'fahdabuoolila.px@gmail.com',
            'password' => Hash::make('123@Fahd'),
            'ability' => 'true',
            'job' => 'Backend Developer',
            'active' => 'true',
            'first_log' => 'true',
        ]);
        user::factory()->create([
            'name' => 'Khaled.nagy',
            'email' => 'khaled@gmail.com',
            'password' => Hash::make('123@Khaled'),
            'ability' => 'true',
            'job' => 'COFounder & CTO',
            'active' => 'true',
            'first_log' => 'true',
        ]);
    }
}
