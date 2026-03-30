<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = now()->subDays(7);
        
        for ($i = 0; $i <= 7; $i++) {
            $currentDate = $startDate->copy()->addDays($i);
            
            \App\Models\SensorLog::create([
                'capacity_organik' => rand(10, 95),
                'capacity_non_organik' => rand(10, 90),
                'is_full_organik' => rand(0, 100) > 80, // 20% chance to be marked full
                'is_full_non_organik' => rand(0, 100) > 90,
                'recorded_at' => $currentDate,
            ]);
        }
    }
}
