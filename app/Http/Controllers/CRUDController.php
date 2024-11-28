<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

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

            session()->flash('info', [
                'pesan' => 'Data berhasil ditambahkan.',
                'warna' => 'green',
            ]);
            return redirect('/inventaris/audit/tambah');
            
        } catch (\Exception $e) {
            session()->flash('info', [
                'pesan' => 'Gagal menyimpan data: ' . $e->getMessage(),
                'warna' => 'red',
            ]);
            return redirect()->back();
        };
    }

    public function index() 
    {
        $title = "Tambah Data Inventaris";

        $username = session('username');

        return view('inventaris-create', compact("title", "username"));
    
    }

    public function showUpdatePage($tahun = null, $id = null) {
        
        $inventory = Inventory::find($id);

        $title = "Edit data inventaris";

        $username = session("username");

        return view("inventaris-update", compact( "inventory", "title", "username"));
    }
    
    public function update(Request $request, $tahun = null, $id = null) 
    {    

        $inventory = Inventory::findOrFail($id);
        
        $inventory->nama_barang = $request->input('nama_barang');
        $inventory->sumber_dana = $request->input('sumber_dana');
        $inventory->editor = session('username');
        $inventory->jumlah = $request->input('jumlah');
        $inventory->tanggal = $request->input('tanggal');
        
        if ($request->hasFile('gambar')) {

            if ($request->file('gambar')->getSize() > 2048000) { 
                
                session()->flash('success', [
                    'pesan' => 'Data gagal diperbarui, ukuran gambar lebih dari 2 mb',
                    'warna' => 'red',
                ]);

                return "<script>
                    window.history.back();
                </script>";
            }
            
            if ($inventory->gambar) {

                Storage::delete($inventory->gambar);

            }

            $gambarPath = $request->file('gambar')->store('images', 'public'); 

            $inventory->gambar = $gambarPath; 

        } else {
        
            $inventory->gambar = $request->input('gambarLama');
        }
        
        $inventory->save();
        
        $tahun = \Carbon\Carbon::parse($inventory->tanggal)->format('Y');

        return redirect("/inventaris/inventory/{$tahun}/{$inventory->id}")->with('success', 'Data berhasil diperbarui.');
    }


}
