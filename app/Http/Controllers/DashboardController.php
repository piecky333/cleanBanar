<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user() && auth()->user()->role === 'admin') {
            $totalPetugas = \App\Models\User::where('role', 'petugas')->count();
            return view('dashboard.admin', compact('totalPetugas'));
        }
        return view('dashboard.petugas');
    }

    public function emptyTrash(Request $request, $type)
    {
        // Simple mock of emptying trash:
        // By creating a new log for today with 0 capacity for the chosen type
        $lastLog = \App\Models\SensorLog::latest('recorded_at')->first();
        
        \App\Models\SensorLog::create([
            'capacity_organik' => $type === 'organik' ? 0 : ($lastLog->capacity_organik ?? 0),
            'capacity_non_organik' => $type === 'non_organik' ? 0 : ($lastLog->capacity_non_organik ?? 0),
            'is_full_organik' => $type === 'organik' ? false : ($lastLog->is_full_organik ?? false),
            'is_full_non_organik' => $type === 'non_organik' ? false : ($lastLog->is_full_non_organik ?? false),
            'recorded_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Tong sampah ' . ucfirst($type) . ' berhasil ditandai telah dikosongkan.');
    }
}
