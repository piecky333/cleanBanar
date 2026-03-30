@extends('layouts.mobile')

@section('content')
<!-- Header with gradient and shape -->
<div class="pt-8 px-6 pb-24 bg-gradient-to-br from-primary to-emerald-700 text-white rounded-b-[2.5rem] shadow-lg relative overflow-hidden">
    <!-- Decorative circles -->
    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white opacity-10"></div>
    <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-24 h-24 rounded-full bg-white opacity-10"></div>
    
    <div class="flex justify-between items-center relative z-10">
        <div>
            <p class="text-emerald-100 text-xs font-medium uppercase tracking-wider mb-1">Overview Sistem</p>
            <h1 class="text-2xl font-bold flex items-center">
                <i class="fa-solid fa-shield-halved mr-2 text-sm"></i> Admin Panel
            </h1>
        </div>
        <div class="h-12 w-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-md shadow-sm border border-white/10">
            <i class="fa-solid fa-crown text-white text-lg"></i>
        </div>
    </div>
    <div class="mt-6 relative z-10">
        <p class="text-sm text-emerald-100 mb-1 opacity-90">Total Petugas Aktif</p>
        <div class="flex items-center gap-2">
            <h2 class="text-3xl font-extrabold tracking-tight">{{ $totalPetugas }} <span class="text-lg font-normal">orang</span></h2>
        </div>
    </div>
</div>

<div class="px-5 -mt-16 mx-auto relative z-20 space-y-4 pb-8">
    <!-- Quick Actions Grid -->
    <div class="grid grid-cols-2 gap-3 mb-6">
        <a href="{{ route('admin.users.index') }}" class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center gap-3 active:scale-95 transition-transform text-center hover:bg-indigo-50">
            <div class="h-12 w-12 rounded-xl bg-indigo-50 text-indigo-500 flex items-center justify-center">
                <i class="fa-solid fa-users-gear text-xl"></i>
            </div>
            <div>
                <p class="font-bold text-gray-800 text-sm">Manajemen Petugas</p>
                <p class="text-[9px] text-gray-400 mt-1">Tambah/hapus akun</p>
            </div>
        </a>
        <a href="{{ route('statistics') }}" class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center gap-3 active:scale-95 transition-transform text-center hover:bg-emerald-50">
            <div class="h-12 w-12 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center">
                <i class="fa-solid fa-chart-pie text-xl"></i>
            </div>
            <div>
                <p class="font-bold text-gray-800 text-sm">Laporan Analitik</p>
                <p class="text-[9px] text-gray-400 mt-1">Lihat grafik performa</p>
            </div>
        </a>
    </div>

    <!-- Sistem Info Box -->
    <div class="bg-white rounded-3xl p-5 shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-gray-100">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-gray-800 text-sm"><i class="fa-solid fa-server text-indigo-500 mr-2"></i>Status Perangkat</h3>
            <span class="px-2 py-1 bg-green-50 text-green-600 text-[9px] uppercase font-bold rounded-md">Online</span>
        </div>
        <p class="text-xs text-gray-500 leading-relaxed mb-4">Sistem berjalan normal. Tempat sampah pintar Area Kampus A dan B aktif mengirim data.</p>
        
        <div class="w-full bg-gray-50 rounded-xl p-3 flex justify-between items-center border border-gray-100">
            <span class="text-xs font-bold text-gray-600">Terakhir Update Server</span>
            <span class="text-xs text-indigo-600 font-mono">{{ now()->format('H:i:s') }}</span>
        </div>
    </div>
</div>
@endsection
