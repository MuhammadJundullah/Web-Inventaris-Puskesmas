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
        
        // Mengirim data ke view
        return view('inventory', compact('posts', 'title', 'years'));
    }
}
