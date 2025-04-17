<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Telkom Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .btn-hover {
            transition: all 0.3s ease-in-out;
        }
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .input-focus:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-gradient-to-r from-blue-50 to-purple-50 shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold text-blue-700 mb-4">Tambah Proyek</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold text-gray-700">Nama Proyek</label>
                <input type="text" name="project_name" class="w-full p-3 border rounded-lg input-focus focus:outline-none" required>
            </div>

            <div>
                <label class="block font-semibold text-gray-700">Lokasi</label>
                <input type="text" name="lokasi" class="w-full p-3 border rounded-lg input-focus focus:outline-none" required>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold text-gray-700">Jumlah Tenaga Kerja</label>
                <input type="number" name="jumlah_tenaga_kerja" class="w-full p-3 border rounded-lg input-focus focus:outline-none" required>
            </div>

            <div>
                <label class="block font-semibold text-gray-700">Durasi (Hari)</label>
                <input type="number" name="durasi" required min="1" class="w-full p-3 border rounded-lg input-focus focus:outline-none">
            </div>
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" class="w-full p-3 border rounded-lg input-focus focus:outline-none" required></textarea>
        </div>

        <div class="mb-4">
            <label for="documentation" class="block text-gray-700">Dokumentasi</label>
            <input type="file" name="documentation" id="documentation" class="form-input mt-1 block w-full">
        </div>

        <div class="flex justify-between gap-4">
            <a href="{{ route('projects.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg btn-hover hover:bg-gray-600 flex-1 text-center">
                Kembali
            </a>
            <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-lg btn-hover hover:from-blue-700 hover:to-purple-700 flex-1 text-center">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection