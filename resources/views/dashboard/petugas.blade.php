@extends('layouts.mobile')

@section('content')
<!-- Header with gradient and shape -->
<div class="pt-8 px-6 pb-24 bg-gradient-to-br from-primary to-emerald-700 text-white rounded-b-[2.5rem] shadow-lg relative overflow-hidden">
    <!-- Decorative circles -->
    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white opacity-10"></div>
    <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-24 h-24 rounded-full bg-white opacity-10"></div>
    
    <div class="flex justify-between items-center relative z-10">
        <div>
            <p class="text-emerald-100 text-xs font-medium uppercase tracking-wider mb-1">Monitoring Area</p>
            <h1 class="text-2xl font-bold flex items-center">
                <i class="fa-solid fa-location-dot mr-2 text-sm"></i> Area Kampus A
            </h1>
        </div>
        <div class="h-12 w-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-md shadow-sm border border-white/10">
            <i class="fa-solid fa-trash-can text-white text-lg animate-pulse"></i>
        </div>
    </div>
    <div class="mt-6 relative z-10">
        <p class="text-sm text-emerald-100 mb-1 opacity-90">Status Sistem Keseluruhan</p>
        <div class="flex items-center gap-2">
            <div class="h-2.5 w-2.5 rounded-full bg-green-300 animate-ping"></div>
            <h2 class="text-3xl font-extrabold tracking-tight">Normal</h2>
        </div>
    </div>
</div>

<div class="px-5 -mt-16 mx-auto relative z-20 space-y-4">
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-2xl text-xs flex items-center shadow-sm">
            <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
        </div>
    @endif
    <!-- Card Organik -->
    <div class="bg-white rounded-3xl p-5 shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-gray-100 transition-transform hover:scale-[1.02]">
        <div class="flex justify-between items-center mb-5">
            <div class="flex items-center gap-4">
                <div class="h-12 w-12 bg-green-50 text-primary rounded-2xl flex items-center justify-center shadow-inner">
                    <i class="fa-solid fa-leaf text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 text-base">Organik</h3>
                    <p class="text-[10px] text-gray-400 font-medium"><i class="fa-regular fa-clock mr-1"></i>Update 2 min lalu</p>
                </div>
            </div>
            <span class="px-3 py-1.5 bg-green-50 text-primary text-[10px] uppercase font-bold rounded-full border border-green-100 placeholder-opacity-50 tracking-wider">Tersedia</span>
        </div>
        
        <div class="mt-2">
            <div class="flex justify-between text-sm mb-2 items-end">
                <span class="text-gray-500 font-medium text-xs">Tingkat Kapasitas</span>
                <span class="font-extrabold text-gray-800 text-lg">45%</span>
            </div>
            <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                <div class="bg-gradient-to-r from-green-400 to-primary h-3 rounded-full" style="width: 45%"></div>
            </div>
            <p class="text-[10px] text-gray-400 mt-2 text-right">Perkiraan penuh dlm 2 hari</p>
        </div>
        <form action="{{ route('petugas.empty', 'organik') }}" method="POST" class="mt-4 border-t border-gray-100 pt-3" onsubmit="return confirm('Tandai sampah Organik telah dikosongkan?')">
            @csrf
            <button type="submit" class="w-full bg-green-50 text-green-600 hover:bg-green-100 font-bold py-2 rounded-xl text-xs transition-colors flex items-center justify-center">
                <i class="fa-solid fa-check mr-1"></i> Tandai Telah Dikosongkan
            </button>
        </form>
    </div>

    <!-- Card Non-Organik -->
    <div class="bg-white rounded-3xl p-5 shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-gray-100 transition-transform hover:scale-[1.02]">
        <div class="flex justify-between items-center mb-5">
            <div class="flex items-center gap-4">
                <div class="h-12 w-12 bg-blue-50 text-secondary rounded-2xl flex items-center justify-center shadow-inner">
                    <i class="fa-solid fa-bottle-water text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 text-base">Non-Organik</h3>
                    <p class="text-[10px] text-gray-400 font-medium"><i class="fa-regular fa-clock mr-1"></i>Update 2 min lalu</p>
                </div>
            </div>
            <span class="px-3 py-1.5 bg-yellow-50 text-yellow-600 text-[10px] uppercase font-bold rounded-full border border-yellow-100 tracking-wider animate-pulse">Hampir Penuh</span>
        </div>
        
        <div class="mt-2">
            <div class="flex justify-between text-sm mb-2 items-end">
                <span class="text-gray-500 font-medium text-xs">Tingkat Kapasitas</span>
                <span class="font-extrabold text-gray-800 text-lg">85%</span>
            </div>
            <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-400 to-secondary h-3 rounded-full" style="width: 85%"></div>
            </div>
            <p class="text-[10px] text-gray-400 mt-2 text-right">Perlu segera dikosongkan</p>
        </div>
        <form action="{{ route('petugas.empty', 'non_organik') }}" method="POST" class="mt-4 border-t border-gray-100 pt-3" onsubmit="return confirm('Tandai sampah Non-Organik telah dikosongkan?')">
            @csrf
            <button type="submit" class="w-full bg-blue-50 text-blue-600 hover:bg-blue-100 font-bold py-2 rounded-xl text-xs transition-colors flex items-center justify-center">
                <i class="fa-solid fa-check mr-1"></i> Tandai Telah Dikosongkan
            </button>
        </form>
    </div>
    
    <!-- Title Mini -->
    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mt-4 ml-1 mb-1">Status Sensor</h3>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-2 gap-3 pb-6">
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center">
                <i class="fa-solid fa-temperature-half text-lg"></i>
            </div>
            <div>
                <p class="text-[9px] text-gray-400 uppercase tracking-widest font-bold">Suhu Dalam</p>
                <p class="font-bold text-gray-800 text-sm">32°C</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-purple-50 text-purple-500 flex items-center justify-center">
                <i class="fa-solid fa-battery-three-quarters text-lg"></i>
            </div>
            <div>
                <p class="text-[9px] text-gray-400 uppercase tracking-widest font-bold">Baterai Alat</p>
                <p class="font-bold text-gray-800 text-sm">78%</p>
            </div>
        </div>
    </div>
</div>
@endsection
