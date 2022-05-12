<?php

namespace App\Exports;

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
        $sensor = Tds::select('tds.nilai as tds', 'phs.nilai as ph')->join('phs', 'tds.id', '=', 'phs.id')->get();
        return $sensor;
    }

    public function headings(): array
    {
        return ["Nilai TDS", "Nilai PH"];
    }
}
