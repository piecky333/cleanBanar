<?php

namespace App\Exports;

use App\Models\SensorLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SensorLogsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SensorLog::select('id', 'capacity_organik', 'capacity_non_organik', 'is_full_organik', 'is_full_non_organik', 'recorded_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kapasitas Organik',
            'Kapasitas Non-Organik',
            'Status Penuh Organik',
            'Status Penuh Non-Organik',
            'Waktu Tercatat'
        ];
    }
}
