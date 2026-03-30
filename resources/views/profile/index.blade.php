@extends('layouts.mobile')

@section('content')
<div class="pt-8 px-6 pb-24 bg-gradient-to-br from-primary to-emerald-700 text-white rounded-b-[2.5rem] shadow-lg relative overflow-hidden">
    <!-- Decorative circles -->
    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white opacity-10"></div>
    
    <div class="flex items-center gap-4 relative z-10 mt-2">
        <div class="h-16 w-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-md shadow-sm border border-white/20">
            <i class="fa-solid fa-user text-white text-3xl"></i>
        </div>
        <div>
            <h1 class="text-2xl font-bold">{{ $user->name ?? 'Pengguna' }}</h1>
            <p class="text-emerald-100 text-sm font-medium">{{ $user->email ?? 'email@example.com' }}</p>
        </div>
    </div>
</div>

<div class="px-5 -mt-10 mx-auto relative z-20 space-y-4 pb-8">
    <!-- Menu Profile -->
    <div class="bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-50">
        <div class="p-4 border-b border-gray-50 flex items-center justify-between hover:bg-gray-50 transition-colors">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
                <span class="font-bold text-gray-700 text-sm">Edit Profil</span>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
        </div>
        
        <div class="p-4 border-b border-gray-50 flex items-center justify-between hover:bg-gray-50 transition-colors">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-purple-50 text-purple-500 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <span class="font-bold text-gray-700 text-sm">Pengaturan Notifikasi</span>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
        </div>

        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <span class="font-bold text-gray-700 text-sm">Keamanan & Password</span>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
        </div>
    </div>

    <!-- Log Out -->
    <div class="bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-50 mt-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full p-4 flex items-center justify-between hover:bg-red-50 transition-colors text-left">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-red-50 text-red-500 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    <span class="font-bold text-red-500 text-sm">Keluar Akun</span>
                </div>
            </button>
        </form>
    </div>
</div>
@endsection
