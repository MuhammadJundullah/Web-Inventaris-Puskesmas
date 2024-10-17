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

        return view('details', compact('inventory', 'title', 'username'));
    }

    public function destroy($tahun = null, $id = null)
    {
        $inventory = Inventory::find($id);

        $inventory->delete();

        response()->json(['message' => 'Data deleted successfully.'], 200);

        return response("<script>
                    window.location.href = '/inventory/$tahun/';
                </script>")->header('Contaent-Type', 'text/html');

    }
}
