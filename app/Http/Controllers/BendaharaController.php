<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Treasurers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BendaharaController extends Controller
{
    public function login()
    {
        return view('bendahara-login');
    }

    public function dashboard()
    {
        $post = Treasurers::selectRaw('Year(tanggal) as year')->distinct()->orderBy('year', 'desc')->pluck('year');

        $title = 'Bendahara dashboard';

        return view('bendahara-dashboard', compact('title', 'post'));
    }

    public function postbyyear($year)
    {
        $postByYear = Treasurers::whereYear('tanggal', $year)->get();

        $title = 'Bendahara ' . $year;

        return view('bendahara-year', compact('postByYear', 'title', 'year'));
    }

    public function loginbendahara(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role != 'bendahara') {
                
                $request->session()->invalidate();

                return back()->withInput()->with('failed', 'Username atau password tidak valid!');
            
            }

            session()->put("username", $request->username);

            return redirect('/bendahara/dashboard');

        } else {

            return back()->withInput()->with('failed', 'Username atau password tidak valid!');
        }
    }

    public function postbyusername($username, $year)
    {
    
        $postByYear = Treasurers::where('nama_pegawai', $username)->whereYear('tanggal', $year)->get();
        
        $title = "Arsip kegiatan " . $username;

        return view('bendahara-year', compact('postByYear', 'title', 'year'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/bendahara/login');
    }

    public function about()
    {
        $title = "About this site";

        $username = session("username");

        return view('bendahara-about', compact('title', 'username'));
    }

    public function registered_accounts()
    {
        $accounts = User::where('role', 'bendahara')->get();

        $username = session("username");

        $title = 'Akun yang terdaftar';
        
        return view('inventaris-akun', compact('accounts', 'title', 'username'));
    }

    public function tambah() 
    {
        $title = "Tambah Data Arsip Bendahara";

        $username = session('username');

        return view('bendahara-create', compact("title", "username"));
    
    }


    public function insert(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'tanggal' => 'required|date',
            'kegiatan' => 'required',
            'dana_yang_digunakan' => 'required|numeric',
        ]);

        $data = $request->only('nama_pegawai', 'tanggal', 'kegiatan', 'dana_yang_digunakan');

        Treasurers::create($data);

        session()->flash('info', [
            'pesan' => 'Data berhasil ditambahkan.',
            'warna' => 'green',
        ]);

        return redirect('/bendahara/audit/tambah');
    }
}
