<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Middleware\AuthMiddleware;

class Controller extends BaseController
{
    public function __construct()
    {
        $this->middleware(AuthMiddleware::class);
    }

    public function beranda()
{
    $logo = asset('images/logotekniksemesta.png'); // Sesuaikan dengan lokasi file logo
    return view('beranda2', compact('logo'));
}


    public function index()
    {
        return view('dashboard');
    }
}
