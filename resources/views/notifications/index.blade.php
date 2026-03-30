@extends('layouts.mobile')

@section('content')
<div class="pt-8 px-6 pb-4 bg-white shadow-sm sticky top-0 z-30">
    <div class="flex items-center justify-between mb-2">
        <h1 class="text-xl font-bold text-gray-800">Notifikasi</h1>
        <div class="text-[11px] font-bold text-primary px-3 py-1 bg-green-50 rounded-full cursor-pointer">Tandai Dibaca</div>
    </div>
</div>

<div class="p-5 space-y-3">
    
    <!-- Notif 1 (Unread) -->
    <div class="bg-red-50 p-4 rounded-3xl border border-red-100 relative shadow-sm">
        <div class="absolute top-4 right-4 h-2.5 w-2.5 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.5)]"></div>
        <div class="flex gap-4">
            <div class="h-10 w-10 shrink-0 rounded-2xl bg-white shadow-sm text-red-500 flex items-center justify-center border border-red-50">
                <i class="fa-solid fa-triangle-exclamation text-lg"></i>
            </div>
            <div>
                <h3 class="font-bold text-gray-900 text-sm pr-4">Organik Penuh!</h3>
                <p class="text-xs text-gray-600 mt-1 leading-relaxed">Kapasitas tong sampah organik di lingkungan A telah mencapai 100%. Harap segera dikosongkan.</p>
                <div class="flex items-center gap-1 mt-2">
                    <i class="fa-regular fa-clock text-[9px] text-red-400"></i>
                    <p class="text-[10px] text-red-400 font-medium">Baru saja</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Notif 2 (Unread) -->
    <div class="bg-yellow-50 p-4 rounded-3xl border border-yellow-100 relative shadow-sm">
        <div class="absolute top-4 right-4 h-2.5 w-2.5 rounded-full bg-yellow-500 shadow-[0_0_8px_rgba(234,179,8,0.5)]"></div>
        <div class="flex gap-4">
            <div class="h-10 w-10 shrink-0 rounded-2xl bg-white shadow-sm text-yellow-600 flex items-center justify-center border border-yellow-50">
                <i class="fa-solid fa-bell text-lg"></i>
            </div>
            <div>
                <h3 class="font-bold text-gray-900 text-sm pr-4">Non-Org Hampir Penuh</h3>
                <p class="text-xs text-gray-600 mt-1 leading-relaxed">Kapasitas tong sampah non-organik di angka 85%. Bersiap untuk persiapan pengosongan rutin.</p>
                <div class="flex items-center gap-1 mt-2">
                    <i class="fa-regular fa-clock text-[9px] text-yellow-500"></i>
                    <p class="text-[10px] text-yellow-500 font-medium">15 menit yang lalu</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Notif 3 (Read) -->
    <div class="bg-white p-4 rounded-3xl border border-gray-100 relative shadow-[0_2px_10px_rgb(0,0,0,0.02)]">
        <div class="flex gap-4">
            <div class="h-10 w-10 shrink-0 rounded-2xl bg-gray-50 text-gray-400 flex items-center justify-center">
                <i class="fa-solid fa-check text-lg"></i>
            </div>
            <div>
                <h3 class="font-bold text-gray-700 text-sm pr-4">Pengosongan Selesai</h3>
                <p class="text-xs text-gray-500 mt-1 leading-relaxed border-b border-gray-50 pb-2">Sampah organik telah berhasil dikosongkan secara manual oleh Petugas Kebersihan Ahmad.</p>
                <div class="flex items-center gap-1 mt-2">
                    <i class="fa-regular fa-clock text-[9px] text-gray-400"></i>
                    <p class="text-[10px] text-gray-400 font-medium">Kemarin, 14:30</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Notif 4 (Read) -->
    <div class="bg-white p-4 rounded-3xl border border-gray-100 relative shadow-[0_2px_10px_rgb(0,0,0,0.02)]">
        <div class="flex gap-4">
            <div class="h-10 w-10 shrink-0 rounded-2xl bg-green-50 text-primary flex items-center justify-center">
                <i class="fa-solid fa-robot text-lg"></i>
            </div>
            <div>
                <h3 class="font-bold text-gray-700 text-sm pr-4">Sistem Online</h3>
                <p class="text-xs text-gray-500 mt-1 leading-relaxed border-b border-gray-50 pb-2">Smart Bin berhasil terkoneksi kembali ke server monitoring utama setelah restart node.</p>
                <div class="flex items-center gap-1 mt-2">
                    <i class="fa-regular fa-calendar-days text-[9px] text-gray-400"></i>
                    <p class="text-[10px] text-gray-400 font-medium">2 Hari lalu</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
