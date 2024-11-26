<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\YearPostsResource;

class PostsController extends Controller
{

    public function posts(Request $request)
    {

        $url = 'http://inventaris-puskesmas.test/api/posts';

        $response = Http::get($url);
        
        if ($response->successful()) {

            $data = $response->json();

        } else {

            return redirect('/login')->with('error', 'Failed to fetch posts. Please log in again.');
        }

        $username = session('username');

        return view('dashboard', compact('data', 'username'));
    }


    public function postsByYear($year = null)
    {  
        $url = 'http://inventaris-puskesmas.test/api/posts/' . $year;

        $response = Http::get($url);

        $data = $response->json();

        $username = session("username");

        return view('inventory', compact('data', 'username'));
    }

    public function show($tahun = null, $id = null)
    {
        $url = 'http://inventaris-puskesmas.test/api/post/' . $tahun . '/' . $id;

        $response = Http::get($url);

        $data = $response->json();

        $username = session("username");

        return view('details', compact('data', 'username'));
    }

    public function destroy($tahun = null, $id = null)
    {
        $inventory = Inventory::find($id);

        $inventory->delete();

        session()->flash('success','Berhasil menghapus data.');

        return response("<script>
                    window.location.href = '/inventory/$tahun';
                </script>")
                ->header('Content-Type', 'text/html');
    }
}
