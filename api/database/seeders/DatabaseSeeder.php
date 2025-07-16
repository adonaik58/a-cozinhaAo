<?php

namespace Database\Seeders;

use App\Models\Us\V1\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {

        User::create([
            'name' => 'Adonai Kambu',
            'email' => 'adonaikambu777@gmail.com',
            'password' => '1234567890'
        ]);
    }
}
