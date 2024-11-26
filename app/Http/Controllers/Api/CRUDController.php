<?php

namespace App\Http\Controllers\Api;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CRUDController extends Controller
{
   public function insert(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'sumber_dana' => 'required|string',
            'jumlah' => 'required|string',
            'editor' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|file|max:2048',
        ]);

        try {
            $imagePath = $request->hasFile('gambar') ? $request->file('gambar')->store('images', 'public') : null;

            Inventory::create([
                'nama_barang' => $request->input('nama_barang'),
                'sumber_dana' => $request->input('sumber_dana'),
                'jumlah' => $request->input('jumlah'),
                'editor' => $request->input('editor'),
                'tanggal' => $request->input('tanggal'),
                'gambar' => $imagePath,
            ]);

            return response()->json([
                'message' => 'Data berhasil ditambahkan.',
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal menyimpan data: ' . $e->getMessage(),
            ], 500);
        }
    }
}
