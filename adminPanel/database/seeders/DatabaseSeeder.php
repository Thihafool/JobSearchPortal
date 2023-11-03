<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'testing@gmail.com',
            'password' => Hash::make('testing'),
            'phone' => '09970840929',
            'gender' => 'Male',
            'address' => 'Yangon',
        ]);
    }
}