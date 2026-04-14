@extends('layouts.mobile')

@section('content')
<div class="pt-8 px-6 pb-24 bg-gradient-to-br from-[#10b981] to-emerald-700 text-white rounded-b-[2.5rem] shadow-lg relative overflow-hidden">
    <div class="flex items-center gap-3 relative z-10">
        <a href="{{ route('admin.devices.index') }}" class="h-10 w-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-md active:scale-95 transition-transform text-white">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold">Tambah Perangkat</h1>
        </div>
    </div>
</div>

<div class="px-5 -mt-16 mx-auto relative z-20 space-y-4 pb-8">
    <form action="{{ route('admin.devices.store') }}" method="POST" class="bg-white rounded-3xl p-6 shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100">
        @csrf
        
        <div class="mb-5">
            <label class="block text-xs font-bold text-gray-700 mb-2">Nama Perangkat / ID Tong <span class="text-red-500">*</span></label>
            <input type="text" name="name" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block p-3.5 transition-colors" placeholder="Cth: Tong Sampah 01" required value="{{ old('name') }}">
            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-5">
            <label class="block text-xs font-bold text-gray-700 mb-2">Main Area <span class="text-red-500">*</span></label>
            <input type="text" name="main_area" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block p-3.5 transition-colors" placeholder="Cth: Area Kampus A" required value="{{ old('main_area') }}">
            @error('main_area')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-5">
            <label class="block text-xs font-bold text-gray-700 mb-2">Sub Area (Detail Lokasi)</label>
            <input type="text" name="sub_area" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block p-3.5 transition-colors" placeholder="Cth: Dekat Parkir Motor" value="{{ old('sub_area') }}">
            @error('sub_area')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-5">
            <label class="block text-xs font-bold text-gray-700 mb-2">Device UID (IoT Identifier)</label>
            <input type="text" name="device_uid" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block p-3.5 transition-colors font-mono" placeholder="Cth: MAC-ADDRESS-123" value="{{ old('device_uid') }}">
            @error('device_uid')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-8">
            <label class="block text-xs font-bold text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
            <select name="status" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block p-3.5" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Pemeliharaan</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            @error('status')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="w-full bg-[#10b981] hover:bg-emerald-600 text-white font-bold rounded-xl text-sm px-5 py-4 text-center transition-colors shadow-md">
            Simpan Perangkat
        </button>
    </form>
</div>
@endsection
