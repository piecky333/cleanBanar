@extends('layouts.mobile')

@section('content')
<div class="pt-8 px-6 pb-6 bg-white shadow-sm sticky top-0 z-30">
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold text-gray-800">Riwayat TPA</h1>
    </div>
    
    @if(session('success'))
        <div class="mt-3 bg-green-50 border border-green-200 text-green-700 px-3 py-2 rounded-xl text-xs flex items-center">
            <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
        </div>
    @endif
</div>

<div class="p-5">
    <div class="relative pl-4 border-l-2 border-gray-100 space-y-8 pb-10">
        
        <!-- Item 1 -->
        <div class="relative">
            <div class="absolute -left-[23px] top-1 h-3 w-3 rounded-full bg-primary ring-4 ring-[#fafafa]"></div>
            <div class="bg-white p-4 rounded-2xl shadow-[0_4px_15px_rgb(0,0,0,0.03)] border border-gray-100">
                <div class="flex justify-between items-start mb-2">
                    <span class="px-2.5 py-1 bg-green-50 text-primary text-[9px] uppercase font-bold rounded-lg border border-green-100">Dikosongkan</span>
                    <span class="text-[10px] text-gray-400 font-medium font-mono">10:45 AM</span>
                </div>
                <h3 class="font-bold text-gray-800 text-sm">Sampah Organik</h3>
                <p class="text-xs text-gray-500 mt-1">Petugas: Ahmad B. <br>Kapasitas akhir: 0%</p>
                <div class="mt-3 pt-3 border-t border-gray-50 flex items-center gap-2 text-[10px] text-gray-400">
                    <i class="fa-regular fa-calendar text-primary pb-px"></i> Hari ini, 24 Mart
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="relative">
            <div class="absolute -left-[23px] top-1 h-3 w-3 rounded-full bg-red-400 ring-4 ring-[#fafafa]"></div>
            <div class="bg-white p-4 rounded-2xl shadow-[0_4px_15px_rgb(0,0,0,0.03)] border border-gray-100">
                <div class="flex justify-between items-start mb-2">
                    <span class="px-2.5 py-1 bg-red-50 text-red-500 text-[9px] uppercase font-bold rounded-lg border border-red-100">Penuh (100%)</span>
                    <span class="text-[10px] text-gray-400 font-medium font-mono">09:12 AM</span>
                </div>
                <h3 class="font-bold text-gray-800 text-sm">Sampah Organik</h3>
                <p class="text-xs text-gray-500 mt-1">Notifikasi dikirim ke petugas kebersihan untuk pengangkutan.</p>
                <div class="mt-3 pt-3 border-t border-gray-50 flex items-center gap-2 text-[10px] text-gray-400">
                    <i class="fa-regular fa-calendar text-red-500 pb-px"></i> Hari ini, 24 Mart
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="relative">
            <div class="absolute -left-[23px] top-1 h-3 w-3 rounded-full bg-blue-500 ring-4 ring-[#fafafa]"></div>
            <div class="bg-white p-4 rounded-2xl shadow-[0_4px_15px_rgb(0,0,0,0.03)] border border-gray-100">
                <div class="flex justify-between items-start mb-2">
                    <span class="px-2.5 py-1 bg-blue-50 text-secondary text-[9px] uppercase font-bold rounded-lg border border-blue-100">Dikosongkan</span>
                    <span class="text-[10px] text-gray-400 font-medium font-mono">15:30 PM</span>
                </div>
                <h3 class="font-bold text-gray-800 text-sm">Sampah Non-Organik</h3>
                <p class="text-xs text-gray-500 mt-1">Petugas: Sutejo <br>Kapasitas akhir: 0%</p>
                <div class="mt-3 pt-3 border-t border-gray-50 flex items-center gap-2 text-[10px] text-gray-400">
                    <i class="fa-regular fa-calendar text-secondary pb-px"></i> Kemarin, 23 Mart
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
