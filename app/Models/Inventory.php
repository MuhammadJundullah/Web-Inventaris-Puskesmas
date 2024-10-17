<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

protected $fillable = [
        'nama_barang',
        'sumber_dana',
        'jumlah',
        'editor',
        'tanggal',
        'gambar',
        'created_at',
        'updated_at',
];
}
