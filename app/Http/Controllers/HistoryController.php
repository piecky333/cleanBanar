<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SensorLogsExport;
use App\Imports\SensorLogsImport;
use Maatwebsite\Excel\Facades\Excel;

class HistoryController extends Controller
{
    public function index()
    {
        return view('history.index');
    }

    public function export()
    {
        return Excel::download(new SensorLogsExport, 'sensor_logs.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        Excel::import(new SensorLogsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Riwayat TPA berhasil diimpor!');
    }
}
