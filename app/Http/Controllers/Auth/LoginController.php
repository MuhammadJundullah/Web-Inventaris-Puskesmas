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

        // Set pesan sukses ke session
        session()->flash('failed', 'Username / Password tidak terdaftar !');

        return response("<script>
                    window.location.href = '/login';
                </script>");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}
