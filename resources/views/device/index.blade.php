@extends('layouts.mobile')

@section('content')
<!-- Header with gradient and shape -->
<div class="pt-8 px-6 pb-24 bg-gradient-to-br from-[#10b981] to-emerald-700 text-white rounded-b-[2.5rem] shadow-lg relative overflow-hidden">
    <!-- Decorative circles -->
    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white opacity-10"></div>
    <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-24 h-24 rounded-full bg-white opacity-10"></div>
    
    <div class="flex items-center gap-3 relative z-10 mb-6">
        <a href="{{ route('dashboard') }}" class="h-10 w-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-md active:scale-95 transition-transform text-white">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <p class="text-emerald-100 text-[10px] font-semibold uppercase tracking-widest mb-0.5 opacity-90">OVERVIEW SISTEM</p>
            <h1 class="text-xl font-bold flex items-center">
                Manajemen Perangkat
            </h1>
        </div>
    </div>
    
    <div class="relative z-10 flex justify-between items-end">
        <div>
            <p class="text-xs text-emerald-100 mb-1 opacity-90">Total Perangkat IoT</p>
            <div class="flex items-center gap-2">
                <h2 class="text-4xl font-extrabold tracking-tight">{{ $devices->count() }} <span class="text-sm font-normal tracking-normal ml-1">unit</span></h2>
            </div>
        </div>
        <a href="{{ route('admin.devices.create') }}" class="bg-white text-emerald-600 px-4 py-2.5 rounded-xl font-bold text-sm shadow-md active:scale-95 transition-transform flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah
        </a>
    </div>
</div>

<div class="px-5 -mt-10 mx-auto relative z-20 space-y-4 pb-8">
    @if(session('success'))
        <div class="bg-green-50 text-green-700 p-4 rounded-2xl text-sm font-medium border border-green-100 mb-4">
            <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
        </div>
    @endif

    @forelse($devices as $device)
        <div class="bg-white rounded-3xl p-5 shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100">
            <div class="flex justify-between items-start mb-3">
                <div class="flex items-center gap-3">
                    <div class="h-12 w-12 rounded-2xl bg-[#f0f9ff] text-indigo-500 flex items-center justify-center">
                        <i class="fa-solid fa-trash-can text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 text-base leading-tight">{{ $device->name }}</h3>
                        <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-widest"><i class="fa-solid fa-location-dot mr-1"></i> {{ $device->main_area }}</p>
                    </div>
                </div>
                <div>
                    @if($device->status === 'active')
                        <span class="px-2.5 py-1 bg-green-50 text-green-600 text-[9px] uppercase font-bold rounded-md">Aktif</span>
                    @elseif($device->status === 'maintenance')
                        <span class="px-2.5 py-1 bg-amber-50 text-amber-600 text-[9px] uppercase font-bold rounded-md">Maintenance</span>
                    @else
                        <span class="px-2.5 py-1 bg-gray-50 text-gray-500 text-[9px] uppercase font-bold rounded-md">Nonaktif</span>
                    @endif
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-3 mb-4 border border-gray-100">
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div>
                        <span class="text-gray-400 block text-[9px] uppercase tracking-wider mb-0.5">Sub Area</span>
                        <span class="font-medium text-gray-700">{{ $device->sub_area ?: '-' }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400 block text-[9px] uppercase tracking-wider mb-0.5">Device UID</span>
                        <span class="font-medium text-gray-700 font-mono">{{ $device->device_uid ?: '-' }}</span>
                    </div>
                </div>
            </div>
            
            <div class="flex gap-2">
                <a href="{{ route('admin.devices.edit', $device->id) }}" class="flex-1 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 py-2.5 rounded-xl font-semibold text-xs transition-colors flex justify-center items-center gap-2">
                    <i class="fa-solid fa-pen"></i> Edit
                </a>
                <form action="{{ route('admin.devices.destroy', $device->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus perangkat ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-50 hover:bg-red-100 text-red-500 font-semibold py-2.5 rounded-xl text-xs transition-colors border border-red-100 flex justify-center items-center gap-2">
                        <i class="fa-solid fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="bg-white rounded-3xl p-8 shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 text-center">
            <div class="h-16 w-16 mx-auto rounded-full bg-gray-50 flex flex-col items-center justify-center text-gray-300 mb-3">
                <i class="fa-solid fa-server text-2xl"></i>
            </div>
            <h3 class="font-bold text-gray-700">Belum ada perangkat</h3>
            <p class="text-xs text-gray-400 mt-2 mb-4 leading-relaxed">Kelola penyebaran tempat sampah pintar di berbagai area dengan menambah data perangkat baru.</p>
            <a href="{{ route('admin.devices.create') }}" class="inline-flex bg-[#10b981] hover:bg-emerald-600 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-sm transition-colors items-center gap-2">
                <i class="fa-solid fa-plus"></i> Tambah Perangkat
            </a>
        </div>
    @endforelse
</div>
@endsection
