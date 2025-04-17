<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek - PT Semesta Pusat Kreasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-blue-700">Edit Proyek</h1>

    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="block font-semibold">Nama Proyek:</label>
        <input type="text" name="project_name" value="{{ $project->project_name }}" 
               class="border p-2 w-full rounded-md" required>

        <label class="block font-semibold mt-2">Lokasi:</label>
        <input type="text" name="lokasi" value="{{ $project->lokasi }}" 
               class="border p-2 w-full rounded-md" required>

        <label class="block font-semibold mt-2">Jumlah Tenaga Kerja:</label>
        <input type="number" name="jumlah_tenaga_kerja" value="{{ $project->jumlah_tenaga_kerja }}" 
               class="border p-2 w-full rounded-md" required>

        <label class="block font-semibold mt-2">Durasi (Hari):</label>
        <input type="number" name="durasi" value="{{ $project->durasi }}" 
               class="border p-2 w-full rounded-md" required>

        <label class="block font-semibold mt-2">Deskripsi:</label>
        <textarea name="deskripsi" class="border p-2 w-full rounded-md" required>{{ $project->deskripsi }}</textarea>

        </div>
    <div class="mb-4">
        <label for="documentation" class="block text-gray-700">Dokumentasi</label>
        <input type="file" name="documentation" id="documentation" class="form-input mt-1 block w-full">
        @if ($project->documentation)
            <a href="{{ asset('storage/' . $project->documentation) }}" target="_blank" class="text-blue-600 underline">Lihat Dokumentasi</a>
        @else
            <span class="text-gray-500">Tidak ada dokumentasi</span>
        @endif
    </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Simpan Perubahan</button>
    </form>
</div>
@endsection
