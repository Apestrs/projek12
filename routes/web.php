<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Halaman utama sebelum login
Route::get('/', function () {
    return view('beranda2'); // Menggunakan beranda2 langsung
})->name('beranda2');

// Route untuk portofolio yang bisa diakses tanpa login
// Portofolio bisa diakses tanpa login
Route::get('/portofolio', [PortofolioController::class, 'portofolio'])->name('portofolio');

// Semua admin route harus login
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/portofolio', [PortofolioController::class, 'adminIndex'])->name('admin.portofolio');
    Route::post('/admin/portofolio/tambah', [PortofolioController::class, 'store'])->name('portofolio.store');
});

// Halaman setelah login
Route::get('/beranda2', function () {
    return view('beranda2');
})->middleware('auth')->name('beranda2');


Route::get('/tentangkami', function () {
    return view('tentangkami');
});


// Route untuk login
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::resource('projects', ProjectController::class);

// Proses login
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->route('beranda2'); // Berhasil login → pindah ke beranda2
    }

    return back()->withErrors(['email' => 'Email atau password salah']);
})->name('login.submit');

// Route untuk logout (hanya bisa diakses dengan POST)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout')->middleware('auth');

// Halaman Hubungi Kami
Route::get('/hubungikami', function () {
    return view('hubungikami');
})->name('hubungikami');

Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

// Dashboard dengan Middleware Auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Middleware Auth untuk grup profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
