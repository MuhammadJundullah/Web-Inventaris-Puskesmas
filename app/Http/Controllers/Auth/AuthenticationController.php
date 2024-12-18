<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthenticationController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::Check()) {
            return redirect("/inventaris/dashboard");
        }
        
        return view('inventaris-login');
    }

    public function login(Request $request) 
    {
        
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role != 'inventaris') {

                $request->session()->invalidate();
            
                return back()->withInput()->with('failed', 'Username atau password tidak valid!');
            
            }

            session()->put("username", $request->username);

            return redirect('/inventaris/dashboard');

        } else {

            return back()->withInput()->with('failed', 'Username atau password tidak valid!');

        }

    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/inventaris/login');
    }
}
