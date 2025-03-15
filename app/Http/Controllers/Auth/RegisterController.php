<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthServices;
class RegisterController extends Controller
{
    private $authServices;
    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ],[
            'name.required' => 'Nama wajib diisi !',
            'email.required' => 'Email wajib diisi !',
            'email.email' => 'Email tidak valid !',
            'email.unique' => 'Email sudah digunakan !',
            'phone.unique' => 'Nomor Telepon sudah digunakan !',
            'phone.required' => 'Nomor Telepon wajib diisi !',
            'password.required' => 'Password wajib diisi !',
            'password_confirmation.required' => 'Konfirmasi Password wajib diisi !',
            'password_confirmation.same' => 'Konfirmasi Password tidak sama !'
        ]);
        if($this->authServices->register([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ])){
            return redirect()->route('login')->with('success', 'Register Berhasil, Silahkan Cek Email Anda Untuk Memverifikasi Akun Anda');
        };
        return redirect()->back()->with('error', 'Register Gagal');
    }
}
