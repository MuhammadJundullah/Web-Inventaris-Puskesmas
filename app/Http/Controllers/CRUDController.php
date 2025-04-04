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
            
                'merek' => $request->input('merek'),
            
                'jumlah' => $request->input('jumlah'),
            
                'kondisi' => $request->input('kondisi'),
            
                'tempat_barang' => $request->input('tempat_barang'),
            
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

        // Validasi input
        $validatedData = $request->validate([

            'nama_barang' => 'required|string|max:255',

            'sumber_dana' => 'required|string|max:255',

            'merek' => 'required|string|max:255',

            'jumlah' => 'required|integer|min:1',

            'kondisi' => 'required|string|max:255','tempat_barang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:2048', 
        ]);

        // Cari data berdasarkan ID
        $inventory = Inventory::findOrFail($id);

        // Update data
        $inventory->nama_barang = $validatedData['nama_barang'];

        $inventory->sumber_dana = $validatedData['sumber_dana'];

        $inventory->editor = session('username');

        $inventory->merek = $validatedData['merek'];

        $inventory->jumlah = $validatedData['jumlah'];

        $inventory->kondisi = $validatedData['kondisi'];

        $inventory->tempat_barang = $validatedData['tempat_barang'];

        $inventory->tanggal = $validatedData['tanggal'];

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama jika ada
            if ($inventory->gambar) {

                Storage::disk('public')->delete($inventory->gambar);

            }

        // Simpan gambar baru
        $gambarPath = $request->file('gambar')->store('images', 'public');

        $inventory->gambar = $gambarPath;

    }

        // Simpan perubahan
        $inventory->save();

        // Ambil tahun dari tanggal
        $tahun = \Carbon\Carbon::parse($inventory->tanggal)->format('Y');

        // Redirect ke halaman detail dengan pesan sukses
        return redirect("/inventaris/barang/{$tahun}/{$inventory->id}")

            ->with('success', 'Data berhasil diperbarui.');

    }


}
