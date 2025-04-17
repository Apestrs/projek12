<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function berita()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk mengakses berita.');
        }

        return view('berita');
    }
}
