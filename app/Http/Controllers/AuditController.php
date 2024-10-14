<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class AuditController extends Controller
{

   public function insert(Request $request)
{
    // Validasi data yang diterima
    $request->validate([
        'nama_barang' => 'required|string',
        'sumber_dana' => 'required|string',
        'tanggal' => 'required|date',
        'gambar' => 'nullable',
    ]);

    // Simpan gambar jika ada
    $imagePath = $request->hasFile('gambar') ? $request->file('gambar')->store('images', 'public') : null;

    try {
    // Validasi manual
    if ($request->file('gambar')->getSize() > 2048000) { 
        return "<script>
            alert('Ukuran file tidak boleh lebih dari 2 MB.');
            window.history.back();
        </script>";
    }

    // Menggunakan Eloquent untuk menyisipkan data
    Inventory::create([
        'nama_barang' => $request->input('nama_barang'),
        'sumber_dana' => $request->input('sumber_dana'),
        'tanggal' => $request->input('tanggal'),
        'gambar' => $imagePath, 
    ]);

    return "<script>
        alert('Data berhasil ditambahkan!');
        window.location.href = '/audit/tambah-data';
    </script>";

} catch (\Exception $e) {
    return "<script>
        alert('Gagal menyimpan data: " . addslashes($e->getMessage()) . "');
        window.history.back();
    </script>";
}
}

}
