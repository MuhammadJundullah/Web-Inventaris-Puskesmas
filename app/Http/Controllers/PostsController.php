<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostsController extends Controller
{

    public function posts(Request $request)
    {

        $post = Inventory::selectRaw('YEAR(tanggal) as year')->distinct()->orderBy('year', 'desc') ->pluck('year');
    
        $title = "Data Inventaris Puskesmas Muara Satu";

        $username = session('username');

        return view('inventaris-dashboard', compact('post', 'title', 'username'));
    }


    public function postsByYear($year = null)
    {  

        $postsByYear = Inventory::whereYear('tanggal', $year)->get();
            
        $title = 'Data Inventaris tahun ' . $year;

        $username = session("username");

        return view('inventaris-inventory', compact('postsByYear', 'title', 'username', 'year'));
    }

    public function show($tahun = null, $id = null)
    {
        $postById = Inventory::find($id);

        $title = 'Details';

        $username = session("username");

        return view('inventaris-details', compact('postById', 'title', 'username', 'tahun'));
    }

    public function destroy($tahun = null, $id = null)
    {
        $inventory = Inventory::find($id);

        $inventory->delete();

        session()->flash('success','Berhasil menghapus data.');

        return response("<script>
                    window.location.href = '/inventaris/inventory/$tahun';
                </script>")
                ->header('Content-Type', 'text/html');
    }
}
