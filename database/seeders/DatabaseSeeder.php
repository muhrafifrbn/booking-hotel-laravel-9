<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kamar;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name" => "admin",
            "password" => "password",
            "username" => "Admin",
            "email" => "admin@gmail.com",
            "hak_akses" => "admin"
        ]);

        User::create([
            "name" => "resepsionis",
            "password" => "password",
            "username" => "Resepsionis",
            "email" => "resepsionis@gmail.com",
            "hak_akses" => "resepsionis"
        ]);

        // Kamar::factory(10)->create();
    }
}
