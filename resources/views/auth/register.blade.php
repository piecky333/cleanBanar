@extends('layouts.mobile')

@section('content')
<div class="min-h-full flex flex-col justify-center bg-gray-50 pt-6">
    <div class="px-6 pb-6 text-center mt-4">
        <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Buat Akun</h1>
        <p class="text-sm text-gray-500 mt-1 font-medium">Bergabung dengan CleanBanar</p>
    </div>

    <div class="bg-white rounded-t-[2.5rem] shadow-[0_-10px_40px_rgba(0,0,0,0.04)] px-8 pt-8 pb-16 flex-1">
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-circle-exclamation text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700 font-medium">
                            {{ $errors->first() }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-regular fa-user text-gray-400"></i>
                    </div>
                    <input type="text" name="name" id="name" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm focus:ring-primary focus:border-primary transition-colors transition-shadow placeholder-gray-400 font-medium" placeholder="Nama Anda" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-regular fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" name="email" id="email" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm focus:ring-primary focus:border-primary transition-colors transition-shadow placeholder-gray-400 font-medium" placeholder="nama@email.com" value="{{ old('email') }}" required>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Password</label>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" id="password" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm focus:ring-primary focus:border-primary transition-colors transition-shadow placeholder-gray-400 font-medium" placeholder="••••••••" required>
                </div>
            </div>
            
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Konfirmasi Password</label>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-check-double text-gray-400"></i>
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm focus:ring-primary focus:border-primary transition-colors transition-shadow placeholder-gray-400 font-medium" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-2xl shadow-lg shadow-emerald-200 text-sm font-bold text-white bg-gradient-to-r from-primary to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all active:scale-[0.98] mt-6">
                Daftar Sekarang
            </button>
        </form>

        <p class="mt-8 text-center text-sm text-gray-500 font-medium">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="font-bold text-primary hover:text-emerald-700 transition-colors">Masuk di sini</a>
        </p>
    </div>
</div>
@endsection
