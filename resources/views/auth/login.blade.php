@extends('layouts.mobile')

@section('content')
<div class="min-h-full flex flex-col justify-center bg-gray-50 pt-10">
    <div class="px-6 pb-8 text-center mt-8">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-3xl bg-emerald-100 text-primary mb-6 shadow-sm">
            <i class="fa-solid fa-leaf text-3xl"></i>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">CleanBanar</h1>
        <p class="text-sm text-gray-500 mt-2 font-medium">Smart Bin Monitoring System</p>
    </div>

    <div class="bg-white rounded-t-[2.5rem] shadow-[0_-10px_40px_rgba(0,0,0,0.04)] px-8 pt-10 pb-16 flex-1">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Masuk ke Akun Anda</h2>
        
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

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-regular fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" name="email" id="email" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm focus:ring-primary focus:border-primary transition-colors transition-shadow placeholder-gray-400 font-medium" placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
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

            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-2xl shadow-lg shadow-emerald-200 text-sm font-bold text-white bg-gradient-to-r from-primary to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all active:scale-[0.98] mt-6">
                Masuk Sekarang
            </button>
        </form>


    </div>
</div>
@endsection
