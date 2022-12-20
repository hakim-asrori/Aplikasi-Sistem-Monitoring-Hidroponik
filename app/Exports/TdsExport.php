<?php

namespace App\Exports;

use App\Models\Tds;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TdsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Tds::select('nilai', 'created_at')->get();
    }

    public function headings(): array
    {
        return ["Nilai TDS", "Tanggal"];
    }
}
