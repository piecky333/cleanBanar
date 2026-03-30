<?php

namespace App\Http\Controllers;

use App\Models\SensorLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $startDate = Carbon::today()->subDays(6); // 7 days including today

        // 1. Rata-rata kapasitas hari ini
        $logsToday = SensorLog::whereDate('recorded_at', $today)->get();
        $avgCapacityToday = [
            'organik' => $logsToday->avg('capacity_organik') ?? 0,
            'non_organik' => $logsToday->avg('capacity_non_organik') ?? 0,
        ];

        // 2. Statistik mingguan (rata-rata minggu ini)
        $logsWeekly = SensorLog::where('recorded_at', '>=', $startDate)->get();
        $avgCapacityWeekly = [
            'organik' => $logsWeekly->avg('capacity_organik') ?? 0,
            'non_organik' => $logsWeekly->avg('capacity_non_organik') ?? 0,
        ];

        // 3. Berapa kali tempat sampah penuh minggu ini
        $fullCount = [
            'organik' => $logsWeekly->where('is_full_organik', true)->count(),
            'non_organik' => $logsWeekly->where('is_full_non_organik', true)->count(),
        ];

        // 4. Data untuk Grafik (7 hari terakhir)
        $chartDates = [];
        $chartDataOrganik = [];
        $chartDataNonOrganik = [];

        // Pre-fill last 7 days to ensure array has all days even if missing in DB
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $chartDates[] = $date->translatedFormat('D'); // Sen, Sel, etc.
            
            $dayLogs = $logsWeekly->filter(function($log) use ($date) {
                return Carbon::parse($log->recorded_at)->isSameDay($date);
            });
            
            $chartDataOrganik[] = round($dayLogs->avg('capacity_organik') ?? 0, 1);
            $chartDataNonOrganik[] = round($dayLogs->avg('capacity_non_organik') ?? 0, 1);
        }

        // 5. Analisis sederhana untuk Tren naik turun
        $trendOrganik = ($chartDataOrganik[6] ?? 0) - ($chartDataOrganik[5] ?? 0);
        $trendNonOrganik = ($chartDataNonOrganik[6] ?? 0) - ($chartDataNonOrganik[5] ?? 0);

        return view('statistics.index', compact(
            'avgCapacityToday', 
            'avgCapacityWeekly', 
            'fullCount', 
            'chartDates', 
            'chartDataOrganik', 
            'chartDataNonOrganik',
            'trendOrganik',
            'trendNonOrganik'
        ));
    }
}
