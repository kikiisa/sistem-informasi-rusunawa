<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $authServices;
    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }
    public function LoginMember()
    {
        return view('auth.auth');
    }

    public function StoreLogin(Request $request)
    {      

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email Harus Diisi !',
            'email.email' => 'Email Tidak Valid !',
            'password.required' => 'Password Harus Diisi !'
        ]);
       
        
        if($this->authServices->loginOperator([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Login Berhasil');
        }
        if($this->authServices->login([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $request->session()->regenerate();
            return redirect()->route('member.dashboard')->with('success', 'Login Berhasil');
        }

       
        
        return redirect()->back()->with('error', 'Email atau Password Salah');
    }

    public function LogoutMember(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }

    public function LogoutOperator(Request $request)
    {
        Auth::guard("operator")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout Berhasil');

    }

    public function RegisterMember()
    {
        return view('auth.register');
    }


}
