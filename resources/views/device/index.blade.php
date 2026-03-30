@extends('layouts.mobile')

@section('content')
<div class="pt-8 px-6 pb-6 bg-white shadow-sm sticky top-0 z-30">
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold text-gray-800">Device Settings</h1>
        <div class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center">
            <i class="fa-solid fa-ellipsis-vertical text-gray-500"></i>
        </div>
    </div>
</div>

<div class="p-5 space-y-6">
    
    <!-- Status Connection Card -->
    <div class="bg-white rounded-3xl p-5 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-20 h-20 bg-primary/5 rounded-full -mr-10 -mt-10"></div>
        
        <div class="flex items-center justify-between mb-4 relative z-10">
            <div>
                <h3 class="font-bold text-gray-800 text-sm">Status Device</h3>
                <p class="text-xs text-gray-400">ID: SB-X09-44A</p>
            </div>
            <div class="flex items-center gap-2 px-3 py-1.5 bg-green-50 text-primary rounded-full border border-green-100">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                <span class="text-[10px] font-bold uppercase tracking-wide">Online</span>
            </div>
        </div>
        
        <div class="grid grid-cols-2 gap-4 mt-6">
            <div>
                <p class="text-[10px] text-gray-400 font-medium uppercase tracking-wider mb-1">Signal Strength</p>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-wifi text-primary text-sm"></i>
                    <span class="font-bold text-gray-800 text-sm">Excellent</span>
                </div>
            </div>
            <div>
                <p class="text-[10px] text-gray-400 font-medium uppercase tracking-wider mb-1">Last Sync</p>
                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-clock text-gray-400 text-sm"></i>
                    <span class="font-bold text-gray-800 text-sm">Just now</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Sensors -->
    <div>
        <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1 mb-3">Active Module Details</h3>
        <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden divide-y divide-gray-50">
            <!-- Ultrasonic 1 -->
            <div class="p-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500">
                        <i class="fa-solid fa-wave-square"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800 text-sm">Ultrasonic (Organik)</p>
                        <p class="text-[10px] text-gray-400">Sensor Kapasitas</p>
                    </div>
                </div>
                <div class="h-6 w-10 flex cursor-pointer rounded-full bg-primary items-center p-1 relative">
                    <div class="h-4 w-4 rounded-full bg-white shadow-sm absolute right-1"></div>
                </div>
            </div>
            
            <!-- Ultrasonic 2 -->
            <div class="p-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500">
                        <i class="fa-solid fa-wave-square"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800 text-sm">Ultrasonic (Non-Org)</p>
                        <p class="text-[10px] text-gray-400">Sensor Kapasitas</p>
                    </div>
                </div>
                <div class="h-6 w-10 flex cursor-pointer rounded-full bg-primary items-center p-1 relative">
                    <div class="h-4 w-4 rounded-full bg-white shadow-sm absolute right-1"></div>
                </div>
            </div>

            <!-- Servo Motor -->
            <div class="p-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500">
                        <i class="fa-solid fa-gears"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800 text-sm">Servo Pemilah</p>
                        <p class="text-[10px] text-gray-400">Pemilah Aktif</p>
                    </div>
                </div>
                <div class="h-6 w-10 flex cursor-pointer rounded-full bg-primary items-center p-1 relative">
                    <div class="h-4 w-4 rounded-full bg-white shadow-sm absolute right-1"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div>
        <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1 mb-3">Device Commands</h3>
        <button class="w-full bg-blue-50 hover:bg-blue-100 text-secondary font-bold py-3.5 px-4 rounded-2xl flex items-center justify-center gap-2 mb-3 transition-colors border border-blue-100">
            <i class="fa-solid fa-rotate"></i> Restart Device Node
        </button>
        <button class="w-full bg-red-50 hover:bg-red-100 text-red-500 font-bold py-3.5 px-4 rounded-2xl flex items-center justify-center gap-2 transition-colors border border-red-100">
            <i class="fa-solid fa-power-off"></i> Force Shutdown
        </button>
    </div>
    
    <div class="pb-6 text-center">
        <p class="text-[10px] text-gray-400">Firmware v2.4.1 (Latest)</p>
    </div>
</div>
@endsection
