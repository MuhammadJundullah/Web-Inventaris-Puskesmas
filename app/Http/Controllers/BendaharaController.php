<?php

namespace App\Http\Controllers;

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
        $post = Treasurers::selectRaw('YEAR(tanggal) as year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $title = 'bendahara dashboard';
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

            session()->put("username", $request->username);

            return redirect('/bendahara/dashboard');
        } else {

            return back()->withInput()->with('failed', 'Username atau password tidak valid!');
        }
    }
}
