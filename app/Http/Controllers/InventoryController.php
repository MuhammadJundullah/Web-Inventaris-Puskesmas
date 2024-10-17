<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index($year = null)
    {
        // ambil data berdasarkan tahun
        if ($year) {
            $posts = Inventory::whereYear('tanggal', $year)->get();
        } else {
            $posts = Inventory::all();
        }

        $years = Inventory::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $title = "Audit Data Inventaris";
        $username = session("username");

        return view('inventory', compact('posts', 'title', 'years', 'username'));
    }

    public function show($tahun = null, $id = null)
    {
        $inventory = Inventory::find($id);
        $title = 'Details';
        $username = session('username');

        // Jika data tidak ditemukan, kembalikan respons 404
        if (!$inventory) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        return view('details', compact('inventory', 'title', 'username'));
    }

    public function destroy($tahun = null, $id = null)
    {
        $inventory = Inventory::find($id);

        // Jika data tidak ditemukan, kembalikan respons 404
        if (!$inventory) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        $inventory->delete();

        return response("<script>
                    window.location.href = '/inventory/$tahun/';
                </script>")->header('Content-Type', 'text/html');
    }

    // cetak
    public function cetak()
    {
        $posts = Inventory::all(); // Mengambil semua data dari model Inventory

        // Mengembalikan view untuk mencetak
        return view('cetak', [
            'title' => 'Daftar Barang',
            'username' => session('username'), // Ambil username dari session
            'posts' => $posts
        ]);
    }

    // Mengunduh PDF
    public function downloadPDF()
    {
        $posts = Inventory::all(); // Mengambil semua data dari model Inventory

        // Buat PDF menggunakan library seperti dompdf atau snappy
        // Contoh dengan dompdf
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf_view', [
            'title' => 'Daftar Barang',
            'posts' => $posts
        ]);

        return $pdf->download('daftar_barang.pdf');
    }
}
