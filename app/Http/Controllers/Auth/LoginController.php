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

            // Simpan username di session
            session(['username' => $request->username]); 

            // Redirect ke halaman yang diinginkan setelah login berhasil
            return redirect()->intended('/dashboard');
        }

        // Set pesan sukses ke session
        session()->flash('failed');

        return response("<script>
                    window.location.href = '/login';
                </script>")->header('Contaent-Type', 'text/html');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
