@extends('layouts.mobile')

@section('content')
<div class="pt-8 px-6 pb-6 bg-white shadow-sm sticky top-0 z-30">
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold text-gray-800">Statistik</h1>
        <div class="bg-gray-100 rounded-lg p-1 flex mt-1">
            <button class="px-3 py-1 text-xs font-bold rounded-md bg-white shadow-sm text-gray-800">Ringkasan</button>
        </div>
    </div>
</div>

<div class="p-5 space-y-5">
    <!-- Totals Today -->
    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider ml-1">Rata-rata Kapasitas Hari Ini</h3>
    <div class="grid grid-cols-2 gap-4 mt-2">
        <div class="bg-gradient-to-br from-green-500 to-primary rounded-3xl p-4 text-white shadow-lg shadow-green-200">
            <div class="flex items-center gap-2 mb-2">
                <i class="fa-solid fa-leaf text-white/80"></i>
                <span class="text-[10px] font-bold uppercase tracking-wider text-white/90">Organik</span>
            </div>
            <h2 class="text-3xl font-extrabold">{{ round($avgCapacityToday['organik'], 1) }}<span class="text-sm font-normal text-white/80 ml-1">%</span></h2>
            <p class="text-[10px] text-white/70 mt-1">
                @if($trendOrganik > 0)
                <i class="fa-solid fa-arrow-up mr-1 text-red-200"></i>Naik {{ round($trendOrganik, 1) }}%
                @else
                <i class="fa-solid fa-arrow-down mr-1 text-green-200"></i>Turun {{ round(abs($trendOrganik), 1) }}%
                @endif
            </p>
        </div>
        <div class="bg-gradient-to-br from-blue-500 to-secondary rounded-3xl p-4 text-white shadow-lg shadow-blue-200">
            <div class="flex items-center gap-2 mb-2">
                <i class="fa-solid fa-bottle-water text-white/80"></i>
                <span class="text-[10px] font-bold uppercase tracking-wider text-white/90">Non-Org</span>
            </div>
            <h2 class="text-3xl font-extrabold">{{ round($avgCapacityToday['non_organik'], 1) }}<span class="text-sm font-normal text-white/80 ml-1">%</span></h2>
            <p class="text-[10px] text-white/70 mt-1">
                @if($trendNonOrganik > 0)
                <i class="fa-solid fa-arrow-up mr-1 text-red-200"></i>Naik {{ round($trendNonOrganik, 1) }}%
                @else
                <i class="fa-solid fa-arrow-down mr-1 text-green-200"></i>Turun {{ round(abs($trendNonOrganik), 1) }}%
                @endif
            </p>
        </div>
    </div>

    <!-- Weekly Stats Box -->
    <div class="bg-white p-5 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex items-center justify-between">
        <div>
            <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Rata-rata Mingguan</h3>
            <p class="text-2xl font-black text-gray-800">{{ round(($avgCapacityWeekly['organik'] + $avgCapacityWeekly['non_organik'])/2, 1) }}%</p>
        </div>

        <div class="h-10 w-[1px] bg-gray-200 mx-2"></div>

        <div class="text-right">
            <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Total Penuh (Mg Ini)</h3>
            <p class="text-xl font-bold text-red-500">{{ $fullCount['organik'] + $fullCount['non_organik'] }} <span class="text-xs text-gray-400 font-medium">kali</span></p>
        </div>
    </div>

    <!-- Chart: Kapasitas -->
    <div class="bg-white p-5 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100">
        <h3 class="text-sm font-bold text-gray-800 mb-4">Grafik Kapasitas (7 Hari)</h3>
        <div class="w-full h-48 relative">
            <canvas id="capacityChart"></canvas>
        </div>
    </div>

    <!-- Chart: Naik Turunnnya (Trend) -->
    <div class="bg-white p-5 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100">
        <h3 class="text-sm font-bold text-gray-800 mb-4">Tren Naik Turun Sampah</h3>
        <div class="w-full h-48 relative">
            <canvas id="trendChart"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const labels = {!! json_encode($chartDates) !!};
        const dataOrganik = {!! json_encode($chartDataOrganik) !!};
        const dataNonOrganik = {!! json_encode($chartDataNonOrganik) !!};

        // Chart 1: Bar Chart Kapasitas
        const ctxCap = document.getElementById('capacityChart').getContext('2d');
        new Chart(ctxCap, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Organik (%)',
                        data: dataOrganik,
                        backgroundColor: '#10B981', // Emerald 500
                        borderRadius: {topLeft: 6, topRight: 6, bottomLeft: 0, bottomRight: 0},
                        barThickness: 10,
                    },
                    {
                        label: 'Non-Org (%)',
                        data: dataNonOrganik,
                        backgroundColor: '#3B82F6', // Blue 500
                        borderRadius: {topLeft: 6, topRight: 6, bottomLeft: 0, bottomRight: 0},
                        barThickness: 10,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { usePointStyle: true, boxWidth: 8, font: { size: 10, family: "'Inter', sans-serif" } }
                    }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: { grid: { color: '#F3F4F6' }, max: 100, ticks: {font: {size:9}} }
                }
            }
        });

        // Chart 2: Line Chart Tren
        const ctxTrend = document.getElementById('trendChart').getContext('2d');
        new Chart(ctxTrend, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Organik',
                        data: dataOrganik,
                        borderColor: '#10B981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#10B981',
                        pointRadius: 4,
                    },
                    {
                        label: 'Non-Org',
                        data: dataNonOrganik,
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#3B82F6',
                        pointRadius: 4,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { usePointStyle: true, boxWidth: 8, font: { size: 10, family: "'Inter', sans-serif" } }
                    }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: { grid: { color: '#F3F4F6' }, max: 100, ticks: {font: {size:9}} }
                }
            }
        });
    });
</script>
@endsection
