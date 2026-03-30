@extends('layouts.mobile')

@section('content')
<div class="pt-8 px-6 pb-6 bg-white shadow-sm sticky top-0 z-30 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('dashboard') }}" class="h-8 w-8 bg-gray-50 rounded-full flex items-center justify-center text-gray-600">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h1 class="text-xl font-bold text-gray-800">Manajemen Petugas</h1>
    </div>
</div>

<div class="p-5 space-y-4">
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-2xl text-sm mb-4 flex items-center">
            <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Form Tambah Petugas -->
    <div class="bg-white p-5 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 mb-6">
        <h3 class="text-sm font-bold text-gray-800 mb-4"><i class="fa-solid fa-user-plus mr-2 text-indigo-500"></i>Tambah Petugas Baru</h3>
        
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-3">
            @csrf
            <div>
                <input type="text" name="name" class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:border-indigo-500 outline-none transition-colors" placeholder="Nama Lengkap" required>
            </div>
            <div>
                <input type="email" name="email" class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:border-indigo-500 outline-none transition-colors" placeholder="Email Akses" required>
            </div>
            <div>
                <input type="password" name="password" class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:border-indigo-500 outline-none transition-colors" placeholder="Password Sistem" required>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white font-bold rounded-xl py-3 text-sm hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-200">
                Buat Akun Petugas
            </button>
        </form>
    </div>

    <!-- List Petugas -->
    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1 mb-2">Daftar Petugas Lapangan</h3>
    
    @forelse($users as $user)
    <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center font-bold">
                {{ substr($user->name, 0, 1) }}
            </div>
            <div>
                <p class="font-bold text-gray-800 text-sm">{{ $user->name }}</p>
                <p class="text-[10px] text-gray-400">{{ $user->email }}</p>
            </div>
        </div>
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus petugas ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="h-8 w-8 bg-red-50 text-red-500 flex items-center justify-center rounded-lg hover:bg-red-100">
                <i class="fa-solid fa-trash-can text-xs"></i>
            </button>
        </form>
    </div>
    @empty
    <div class="text-center text-gray-400 py-6 text-sm">
        <p>Belum ada petugas yang terdaftar.</p>
    </div>
    @endforelse
</div>
@endsection
