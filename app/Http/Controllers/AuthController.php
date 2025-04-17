<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan file auth/login.blade.php ada
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Cek kondisi, misalnya berdasarkan email atau role
            if (Auth::user()->email == 'admin@example.com') {
                return redirect()->route('beranda2'); // Arahkan ke Beranda 2
            }
    
            return redirect()->route('beranda'); // Default ke Beranda 1
        }
        
    
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    
}    
