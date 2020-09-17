<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Denver F",
            'email' => "denverfreeburn@outlook.com",
            'email_verified_at' => now(),
            'password' => Hash::make('DeathEgg')
        ]);
    }
}
