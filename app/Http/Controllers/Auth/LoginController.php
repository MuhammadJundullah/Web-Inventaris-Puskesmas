<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            // simpan username ke session 
            session(['username' => $request->username]); 

            // redirect ke halaman ke dashboard
            return redirect()->intended('/dashboard');
        }

        // return pesan failed kalau salah password ato usernamenya
        session()->flash('failed', 'Username / Password tidak terdaftar !');

        // redirect lagi ke login awokaowk
        return response("<script>
                    window.location.href = '/login';
                </script>");
    }
    
    public function logout(Request $request)
    {
        // hapus sesi loginnya
        Auth::logout();
        return redirect('login');
    }
}
