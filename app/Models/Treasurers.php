<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasurers extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pegawai',
        'id_pegawai',
        'tanggal',
        'kegiatan',
        'dana_yang_digunakan',
        'jumlah',
        'created_at',
        'updated_at',
    ];
}
