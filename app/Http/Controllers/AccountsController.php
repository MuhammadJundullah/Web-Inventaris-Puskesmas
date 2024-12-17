<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountsController extends Controller
{

    public function index()
    {
        $accounts = User::where('role', 'inventaris')->get();

        $username = session("username");

        $title = 'Akun yang terdaftar';
        
        return view('inventaris-akun', compact('accounts', 'title', 'username'));
    }

    public function destroy(string $id)
    {
        $user = User::find($id);

        $userCount = User::where('role', 'inventaris')->count();

        if ($userCount == 1) {
            session()->flash('failed', 'Tidak bisa menghapus akun satu satunya !');

            return response("<script>
                    window.location.href = '/inventaris/registered-account';
                </script>")->header('Contaent-Type', 'text/html');
        }

        $username = session('username');

        if ($username === $user->username) {
            session()->flash('failed', "Akun tidak bisa di hapus karena sedang digunakan !");

            return response("<script>
                    window.location.href = '/inventaris/registered-account';
                </script>")->header('Contaent-Type', 'text/html');
        }

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $user->delete();

        session()->flash('berhasil', "Berhasil menghapus akun !");

        return "<script>
                window.location.href = '/inventaris/registered-account';
            </script>";
    }

    public function showRegistrationForm()
    {
        $title = "Tambahkan akun untuk masuk";

        $username = session("username");

        return view('inventaris-signup', compact('title', 'username'));
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'konfirmasi' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            session()->flash('info', [
            'pesan' => 'Konfirmasi Password tidak sesuai !',
            'warna' => 'red',
        ]);
            
        return response("<script>
                    window.location.href = '/inventaris/signup';
                </script>")->header('Contaent-Type', 'text/html');
        }

        $username = $request->username;
        if (User::where('username', $username)->exists()) {
        session()->flash('info', [
            'pesan' => 'Username sudah terdaftar !',
            'warna' => 'red',
        ]);
            
        return response("<script>
            window.location.href = '/inventaris/signup';
        </script>");
        
        }
        
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), 
            'role' => "inventaris",
        ]);

        session()->flash('info', [
            'pesan' => 'Akun berhasil di daftarkan !',
            'warna' => 'green',
        ]);
        
        return response("<script>
                    window.location.href = '/inventaris/signup';
                </script>")->header('Contaent-Type', 'text/html');

    }
}
