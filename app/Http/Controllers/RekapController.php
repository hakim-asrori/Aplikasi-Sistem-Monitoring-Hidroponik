<?php

namespace App\Http\Controllers;

use App\Exports\SensorExport;
use App\Models\Ph;
use App\Models\Tds;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RekapController extends Controller
{
    public function index()
    {
        $data = [
            "app_title" => "Rekap Data Sensor",
            "tds" => Tds::latest()->paginate(6),
            "ph" => Ph::latest()->paginate(6),
            "ph_max" => Ph::max('nilai'),
            "ph_min" => Ph::min('nilai'),
            "tds_max" => Tds::max('nilai'),
            "tds_min" => Tds::min('nilai'),
        ];
        return view('rekap.index', $data);
    }

    public function download()
    {
        return Excel::download(new SensorExport, date('d_m_Y_His') . '_Data_Sensor.xlsx');
    }
}
