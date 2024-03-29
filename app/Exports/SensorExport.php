<?php

namespace App\Exports;

use App\Models\Ph;
use App\Models\Tds;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SensorExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Ph::select('nilai', 'created_at')->get();
    }

    public function headings(): array
    {
        return ["Nilai PH", "Tanggal"];
    }
}
