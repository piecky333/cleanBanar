@extends('layouts.mobile')

@section('content')
<!-- Header with gradient and shape -->
<div class="pt-8 px-6 pb-24 bg-gradient-to-br from-primary to-emerald-700 text-white rounded-b-[2.5rem] shadow-lg relative overflow-hidden">
    <!-- Decorative circles -->
    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white opacity-10"></div>
    <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-24 h-24 rounded-full bg-white opacity-10"></div>
    
    <div class="flex justify-between items-center relative z-10">
        <div>
            <p class="text-emerald-100 text-[10px] font-semibold uppercase tracking-widest mb-1 opacity-90">OVERVIEW SISTEM</p>
            <h1 class="text-2xl font-bold flex items-center">
                Admin Panel
            </h1>
        </div>
        <div class="h-14 w-14 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-md border border-white/10">
            <!-- decorative subtle square icon -->
            <div class="h-8 w-8 rounded-lg bg-white/20"></div>
        </div>
    </div>
    <div class="mt-6 relative z-10">
        <p class="text-xs text-emerald-100 mb-1 opacity-90">Total Petugas Aktif</p>
        <div class="flex items-center gap-2">
            <h2 class="text-5xl font-extrabold tracking-tight">{{ $totalPetugas }} <span class="text-base font-normal tracking-normal ml-1">orang</span></h2>
        </div>
    </div>
</div>

<div class="px-5 -mt-16 mx-auto relative z-20 space-y-4 pb-8">
    <!-- Quick Actions Grid -->
    <div class="grid grid-cols-2 gap-4 mb-6">
        <a href="{{ route('admin.users.index') }}" class="bg-white p-5 rounded-3xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] flex flex-col items-center gap-4 active:scale-95 transition-transform text-center">
            <div class="h-14 w-14 rounded-2xl bg-[#eff4ff] text-gray-800 flex items-center justify-center mb-1">
                <i class="fa-solid fa-user-group text-2xl"></i>
            </div>
            <div>
                <p class="font-bold text-gray-800 text-sm mb-1 leading-tight">Manajemen<br>Petugas</p>
                <p class="text-[9px] text-gray-400">Tambah/hapus akun</p>
            </div>
        </a>
        <div class="bg-white p-5 rounded-3xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] flex flex-col items-center gap-3 active:scale-95 transition-transform text-center relative overflow-hidden group border border-gray-50 hover:border-green-100">
            <div class="absolute inset-x-0 top-0 h-1 bg-green-500 rounded-t-3xl opacity-80"></div>
            <div class="h-14 w-14 rounded-2xl bg-green-50 text-green-500 flex items-center justify-center mb-1 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                <i class="fa-solid fa-wifi text-2xl"></i>
            </div>
            <div>
                <p class="font-bold text-gray-800 text-sm mb-1 leading-tight">Status<br>Perangkat</p>
                <div class="flex items-center justify-center gap-1.5 mt-1 bg-green-50 py-1 px-2.5 rounded-lg border border-green-100/50">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-1.5 w-1.5 m-auto bg-green-500"></span>
                    </span>
                    <span class="text-[9px] text-green-600 font-bold uppercase tracking-wider">Online</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Rekomendasi Pengganti: Aktivitas Terbaru (Recent Activity) -->
    <div class="bg-white rounded-3xl p-5 shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-gray-100 relative overflow-hidden">
        <!-- Dekorasi latar belakang minor -->
        <div class="absolute -right-6 -bottom-6 opacity-[0.03] text-6xl">
            <i class="fa-solid fa-bolt"></i>
        </div>

        <div class="flex justify-between items-center mb-5 relative z-10">
            <h3 class="font-bold text-gray-800 text-sm flex items-center">
                <div class="w-6 h-6 rounded-md bg-amber-50 text-amber-500 flex items-center justify-center mr-2">
                    <i class="fa-solid fa-bolt text-xs"></i>
                </div>
                Aktivitas Terbaru
            </h3>
            <a href="/history" class="text-[10px] text-primary font-semibold hover:underline bg-primary/5 px-2 py-1 rounded-md">Lihat Semua</a>
        </div>
        
        <div class="space-y-4 relative z-10">
            <!-- Timeline Item 1 -->
            <div class="flex items-start gap-3 group cursor-pointer">
                <div class="h-9 w-9 rounded-xl bg-blue-50 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-300">
                    <i class="fa-solid fa-trash-arrow-up text-blue-500 text-sm"></i>
                </div>
                <div class="flex-1 w-full pt-1">
                    <div class="flex justify-between items-baseline mb-0.5">
                        <p class="text-xs font-bold text-gray-800 line-clamp-1">Tempat Sampah Area A Penuh</p>
                        <span class="text-[9px] font-medium text-gray-400 whitespace-nowrap ml-2">10 mnt lalu</span>
                    </div>
                    <p class="text-[10px] text-gray-500 leading-snug pr-2">Sistem otomatis memberi notifikasi tugasan ke petugas lapangan.</p>
                </div>
            </div>

            <!-- Timeline Item 2 -->
            <div class="flex items-start gap-3 group cursor-pointer">
                <div class="h-9 w-9 rounded-xl bg-emerald-50 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-300">
                    <i class="fa-solid fa-check-double text-emerald-500 text-sm"></i>
                </div>
                <div class="flex-1 w-full pt-1">
                    <div class="flex justify-between items-baseline mb-0.5">
                        <p class="text-xs font-bold text-gray-800 line-clamp-1">Sistem Berjalan Normal</p>
                        <span class="text-[9px] font-medium text-gray-400 whitespace-nowrap ml-2">1 jam lalu</span>
                    </div>
                    <p class="text-[10px] text-gray-500 leading-snug pr-2">Sinkronisasi status dengan modul IoT terkini berhasil dilakukan.</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
