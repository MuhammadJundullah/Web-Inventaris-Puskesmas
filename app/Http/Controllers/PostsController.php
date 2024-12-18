<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Exports\DataExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

        $url = url("/scan/inventaris/barang/$tahun/$id");

        $qrCode = QrCode::size(200)->generate($url);

        $title = 'Details';

        $username = session("username");

        return view('inventaris-details', compact('postById', 'title', 'username', 'tahun', 'qrCode'));
    }

    public function destroy($tahun = null, $id = null)
    {
        $inventory = Inventory::find($id);

        if ($inventory) {

            if (!empty($inventory->gambar) && Storage::disk('public')->exists($inventory->gambar)) {

                Storage::disk('public')->delete($inventory->gambar);
            }

            $inventory->delete();

            session()->flash('success', 'Berhasil menghapus data.');

            return response("<script>window.location.href = '/inventaris/inventory/$tahun'; </script>")->header('Content-Type', 'text/html');
        } else {

            session()->flash('error', 'Data tidak ditemukan.');

            return response("<script>window.location.href = '/inventaris/inventory/$tahun'; </script>")->header('Content-Type', 'text/html');
        }

    }

    public function showScanPage($tahun = null, $id = null)
    {
        $postById = Inventory::find($id);

        return view('inventaris-scanPage', compact('postById', 'tahun'));
    }

    public function generateQrCodePdf($tahun, $id)
    {
        $url = url("/scan/inventaris/barang/$tahun/$id");

        $qrCode = QrCode::size(500)->generate($url);
        
        $pdf = Pdf::loadView('inventaris-cetakQr', compact('qrCode'));

        return view('inventaris-cetakQr', compact('qrCode'));
    }

    public function export($year)
    {
        return Excel::download(new DataExport($year), 'inventaris_'.$year.'.xlsx');
    }
}
