<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
        public function index() 
    {
       // Mengambil semua data dari tabel posts
        $posts = Inventory::all();

        // Menambahkan variabel title
        $title = "Audit Data Inventaris";
        
        // Mengirim data ke view
        return view('/inventory', compact('posts', 'title'));
    }
}
