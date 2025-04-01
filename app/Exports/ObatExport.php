<?php

namespace App\Exports;

use App\Http\Middleware\inventaris;
use App\Models\Inventory;
use App\Models\Treasurers;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ObatExport implements FromCollection
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function collection()
    {
        $data = Treasurers::whereYear('tanggal', $this->year)
                        ->select('id', 'nama_pegawai', 'id_pegawai', 'tanggal', 'kegiatan', 'dana_yang_digunakan', 'jumlah')
                        ->get();
        return $data;        
    }

    public function headings(): array
    {
        return [
            'id',
            'nama obat',
            'tanggal masuk',
            'jenis obat',
            'harga',
            'stok obat'
        ];
    }

    public function title(): string
    {
        return 'Inventaris ' . $this->year;
    }
}