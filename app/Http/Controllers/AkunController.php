<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = User::All();
        $username = session("username");
        $title = 'Akun yang terdaftar';
        return view('akun', compact('accounts', 'title', 'username'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // cari dulu id dari url tadi ke database kayak pakai select * from user where id = id;
        $user = User::find($id);

        // cek kita punya berapa akun
        $userCount = User::count();

        // kalo cuma tinggal 1, ga bole hapus akun
        if ($userCount == 1) {
            session()->flash('failed', 'Tidak bisa menghapus akun satu satunya !');

            return response("<script>
                    window.location.href = '/registered-account';
                </script>")->header('Contaent-Type', 'text/html');
        }

        // cek apakah user sedang berada di akun ini
        $username = session('username');

        if ($username === $user->username) {
            session()->flash('failed', "Akun tidak bisa di hapus karena sedang digunakan !");

            return response("<script>
                    window.location.href = '/registered-account';
                </script>")->header('Contaent-Type', 'text/html');
        }

        // kalau gada user dengan id itu keluarkan message error bre
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // hapus user 
        $user->delete();

        // keluarin session berhasil buat nampilin modal 
        session()->flash('berhasil', "Berhasil menghapus akun !");

        // langsung redirect ae ke akun terdaftar
        return "<script>
                window.location.href = '/registered-account';
            </script>";
    }

    public function showRegistrationForm()
    {
        $title = "Tambahkan akun untuk masuk";

        $username = session("username");

        return view('signup', compact('title', 'username'));
    }

    public function register(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'konfirmasi' => 'required|same:password',
        ]);

        // Jika validasi gagal, kembalikan script alert
        if ($validator->fails()) {
            session()->flash('info', [
            'pesan' => 'Konfirmasi Password tidak sesuai !',
            'warna' => 'red',
        ]);
            
        return response("<script>
                    window.location.href = '/signup';
                </script>")->header('Contaent-Type', 'text/html');
        }

          // Cek apakah username yang akan dihapus sudah ada di database
        $username = $request->username;
        if (User::where('username', $username)->exists()) {
        session()->flash('info', [
            'pesan' => 'Username sudah terdaftar !',
            'warna' => 'red',
        ]);
            
        return response("<script>
            window.location.href = '/signup';
        </script>");
        
    }
        // menginsert user baru ges
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), 
        ]);

        // buat session dulu buat nampilin modal bre
        session()->flash('info', [
            'pesan' => 'Akun berhasil di daftarkan !',
            'warna' => 'green',
        ]);
        
        // redirect balik aja abis signup
        return response("<script>
                    window.location.href = '/signup';
                </script>")->header('Contaent-Type', 'text/html');

    }
}
