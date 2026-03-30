<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cleanbanar.com'],
            [
                'name' => 'Admin Utama',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'petugas@cleanbanar.com'],
            [
                'name' => 'Petugas Kebersihan',
                'password' => bcrypt('password'),
                'role' => 'petugas',
            ]
        );

        $this->call(SensorLogSeeder::class);
    }
}
