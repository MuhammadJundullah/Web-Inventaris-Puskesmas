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
        $title = 'Akun yang terdaftar';
        return view('akun', compact('accounts', 'title'));
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
        // Temukan user berdasarkan ID
        $user = User::find($id);

        // Jika user tidak ditemukan, kembalikan respons dengan error
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Cek jumlah user yang tersisa
        $userCount = User::count();

        // Jika hanya tinggal 1 user, tidak boleh menghapus
        if ($userCount <= 1) {
            return "<script>
                alert(' ⚠️ Akun satu satunya, tidak bisa di hapus !');
                window.location.href = '/registered-account';
            </script>";
        }

        // Hapus user
        $user->delete();

        // Kembalikan respons sukses
        return "<script>
            alert('Akun berhasil di hapus!');
            window.location.href = '/registered-account';
        </script>";
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
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
            return response("<script>
                    alert('Konfirmasi password salah !');
                    window.location.href = '/signup';
                </script>")->header('Contaent-Type', 'text/html');
        }

        // Buat user baru
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Enkripsi password
        ]);

        // Set pesan sukses ke session
        return session()->flash('success', 'Akun berhasil didaftarkan!');
    }
}
