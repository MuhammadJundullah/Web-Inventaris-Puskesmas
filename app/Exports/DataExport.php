<?php

namespace App\Exports;

use App\Http\Middleware\inventaris;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromCollection
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function collection()
    {
        $data = Inventory::whereYear('tanggal', $this->year)
                        ->select('id', 'nama_barang', 'sumber_dana', 'merek', 'jumlah', 'kondisi', 'tempat_barang', 'tanggal')
                        ->get();
        return $data;        
    }

    public function headings(): array
    {
        return [
            'id',
            'nama barang',
            'sumber dana',
            'merek',
            'Jumlah',
            'kondisi',
            'tempat barang',
            'tanggal',
        ];
    }

    public function title(): string
    {
        return 'Inventaris ' . $this->year;
    }
}