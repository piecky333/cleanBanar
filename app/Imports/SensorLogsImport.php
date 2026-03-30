<?php

namespace App\Imports;

use App\Models\SensorLog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class SensorLogsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            $recordedAt = isset($row['waktu_tercatat']) ? Carbon::parse($row['waktu_tercatat']) : now();
        } catch (\Exception $e) {
            $recordedAt = now();
        }

        return new SensorLog([
            'capacity_organik'      => $row['kapasitas_organik'] ?? 0,
            'capacity_non_organik'  => $row['kapasitas_non_organik'] ?? 0,
            'is_full_organik'       => $row['status_penuh_organik'] ?? false,
            'is_full_non_organik'   => $row['status_penuh_non_organik'] ?? false,
            'recorded_at'           => $recordedAt,
        ]);
    }
}
