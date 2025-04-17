<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PortofolioController extends Controller
{
    // Constructor tanpa middleware auth
    public function __construct()
    {
        // Tidak menggunakan middleware auth agar portofolio bisa diakses semua orang
    }

    // Method untuk menampilkan portofolio
    public function portofolio()
    {
        // Ambil semua proyek dengan kolom yang diperlukan, termasuk dokumentasi
        $projects = Project::select('id', 'project_name', 'lokasi', 'jumlah_tenaga_kerja', 'durasi', 'deskripsi', 'documentation')
            ->latest()
            ->paginate(9);

        // Debug data (opsional, bisa dihapus setelah memastikan data benar)
        // dd($projects);

        return view('portofolio', compact('projects'));
    }
}