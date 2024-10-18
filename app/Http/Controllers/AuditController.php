<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\alert;
use Monolog\Processor\WebProcessor;
use Illuminate\Support\Facades\Storage;

class AuditController extends Controller
{

    public function insert(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'sumber_dana' => 'required|string',
            'jumlah' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable',
        ]);

        $imagePath = $request->hasFile('gambar') ? $request->file('gambar')->store('images', 'public') : null;

        try {
            if ($request->file('gambar')->getSize() > 2048000) { 
                
                session()->flash('info', [
                    'pesan' => 'Data gagal ditambahkann, ukuran gambar lebih dari 2 mb.',
                    'warna' => 'red',
                ]);

                return "<script>
                    window.history.back();
                </script>";
        }

        Inventory::create([
            'nama_barang' => $request->input('nama_barang'),
            'sumber_dana' => $request->input('sumber_dana'),
            'jumlah' => $request->input('jumlah'),
            'editor' => session('username'),
            'tanggal' => $request->input('tanggal'),
            'gambar' => $imagePath, 
        ]);

        session()->flash('info', [
            'pesan' => 'Data berhasil ditambahkan.',
            'warna' => 'green',
        ]);
            
        return response("<script>
                    window.location.href = '/audit/tambah';
                </script>")->header('Contaent-Type', 'text/html');

        } catch (\Exception $e) {
            return "<script>
                alert('Gagal menyimpan data: " . addslashes($e->getMessage()) . "');
                window.history.back();
            </script>";
        }
    }

    public function index() 
    {
        $title = "Tambah Data Inventaris";

        $username = session('username');

        return view('create', compact("title", "username"));
    
    }

    public function showUpdatePage($tahun = null, $id = null) {
        
        $inventory = Inventory::find($id);

        $title = "Edit data inventaris";

        $username = session("username");

        return view("update", compact( "inventory", "title", "username"));
    }
    
    public function update(Request $request, $tahun = null, $id = null) 
    
    {    
        $request->validate([
            'nama_barang' => 'required',
            'sumber_dana' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'gambar' => 'nullable',
            'gambarLama' => 'nullable', 
        ]);

        $inventory = Inventory::find($id);

        if (!$inventory) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $inventory->nama_barang = $request->input('nama_barang');
        $inventory->sumber_dana = $request->input('sumber_dana');
        $inventory->editor = session('username');
        $inventory->jumlah = $request->input('jumlah');
        $inventory->tanggal = $request->input('tanggal');

        if ($request->hasFile('gambar')) {
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

        return redirect("/inventory/{$tahun}/{$inventory->id}")->with('success', 'Data berhasil diperbarui.');

    }

}
