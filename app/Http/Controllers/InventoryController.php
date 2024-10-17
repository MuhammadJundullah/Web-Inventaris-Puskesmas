<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index($year = null)
    {
        // Jika tahun diberikan, ambil data berdasarkan tahun tersebut
        if ($year) {
            $posts = Inventory::whereYear('tanggal', $year)->get();
        } else {
            $posts = Inventory::all();
        }

        $years = Inventory::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc') // Urutkan dari yang terbesar
            ->pluck('year');

        // Menambahkan variabel title
        $title = "Audit Data Inventaris";

        $username = session("username");

        // Mengirim data ke view
        return view('inventory', compact('posts', 'title', 'years', 'username'));
    }

    // Metode untuk menampilkan data berdasarkan ID
    public function show($tahun = null, $id = null)
    {
        // Cari data berdasarkan ID
        $inventory = Inventory::find($id);

        $title = 'Details';

        $username = session('username');

        // Jika data tidak ditemukan, kembalikan respons 404
        if (!$inventory) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        // Kembalikan data yang ditemukan
        return view('details', compact('inventory', 'title', 'username'));
    }

    public function destroy($tahun = null, $id = null)
    {
        $inventory = Inventory::find($id);
        
        // Jika data tidak ditemukan, kembalikan respons 404
        if (!$inventory) {
            return response()->json(['message' => 'Data tahun not found.'], 404);
        }

        $inventory->delete();

        response()->json(['message' => 'Data deleted successfully.'], 200);

        return response("<script>
                    window.location.href = '/inventory/$tahun/';
                </script>")->header('Contaent-Type', 'text/html');


    }

    public function showUpdatePage() {
        $title = "Edit data inventaris";
        $username = session("username");

        return view("update", compact("title", "username"));
    }
    
}
