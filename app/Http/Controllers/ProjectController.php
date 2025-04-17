<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Method untuk menampilkan daftar proyek
    public function index()
    {
        // Ambil semua proyek dengan kolom yang diperlukan
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    // Method untuk menampilkan form tambah proyek
    public function create()
    {
        return view('projects.create');
    }

    // Method untuk menyimpan proyek baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'project_name' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah_tenaga_kerja' => 'required|integer|min:1',
            'durasi' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'documentation' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validasi file
        ]);

        // Simpan file dokumentasi jika ada
        $documentationPath = null;
        if ($request->hasFile('documentation')) {
            $documentationPath = $request->file('documentation')->store('documentations', 'public'); // Simpan di storage/app/public/documentations
            // dump($documentationPath);
             Project::create([
                'project_name' => $request->project_name,
                'lokasi' => $request->lokasi,
                'jumlah_tenaga_kerja' => $request->jumlah_tenaga_kerja,
                'durasi' => $request->durasi,
                'deskripsi' => $request->deskripsi ?? null,
                'documentation' => $documentationPath, // Simpan path dokumentasi
            ]);
    
           return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan!');
        }
        else {
            return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan!');        }   

        // Simpan data proyek ke database
    }

    // Method untuk menampilkan form edit proyek
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Method untuk mengupdate proyek
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required',
            'lokasi' => 'required',
            'jumlah_tenaga_kerja' => 'required|integer',
            'durasi' => 'required|integer',
            'deskripsi' => 'required',
            'documentation' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validasi file
        ]);

        $project = Project::findOrFail($id);

        // Simpan file dokumentasi jika ada
        if ($request->hasFile('documentation')) {
            // Hapus file lama jika ada
            if ($project->documentation && Storage::disk('public')->exists($project->documentation)) {
                Storage::disk('public')->delete($project->documentation);
            }

            // Simpan file baru
            $documentationPath = $request->file('documentation')->store('documentations', 'public');
            $project->documentation = $documentationPath;
        }

        // Update data proyek
        $project->update([
            'project_name' => $request->project_name,
            'lokasi' => $request->lokasi,
            'jumlah_tenaga_kerja' => $request->jumlah_tenaga_kerja,
            'durasi' => $request->durasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('projects.index')->with('success', 'Data proyek berhasil diperbarui!');
    }

    // Method untuk menghapus proyek
    public function destroy(Project $project)
    {
        // Hapus file dokumentasi jika ada
        if ($project->documentation && Storage::disk('public')->exists($project->documentation)) {
            Storage::disk('public')->delete($project->documentation);
        }

        // Hapus data proyek dari database
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}