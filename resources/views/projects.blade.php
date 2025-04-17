<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Semesta Pusat Kreasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold mb-6 text-blue-700">Daftar Proyek</h1>
    
    <!-- Tombol Tambah Proyek dan Kembali ke Beranda -->
    <div class="mb-6 flex justify-between">
        <a href="{{ route('project.create') }}" 
           class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-5 rounded-lg shadow-md">
            + Tambah Proyek
        </a>
        <a href="{{ route('beranda2') }}" 
           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded-lg shadow-md">
            &larr; Kembali ke Beranda
        </a>
    </div>

    @if (session('success'))
        <p class="text-green-600 font-semibold mt-2">{{ session('success') }}</p>
    @endif

    <!-- Tabel -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg p-4 border border-gray-300">
        <table class="w-full border-collapse border border-gray-400">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="border px-4 py-2 text-center">Nama Proyek</th>
                    <th class="border px-4 py-2 text-center">Lokasi</th>
                    <th class="border px-4 py-2 text-center">Jumlah Tenaga Kerja</th>
                    <th class="border px-4 py-2 text-center">Durasi (Hari)</th>
                    <th class="border px-4 py-2 text-center">Deskripsi</th>
                    <th class="border px-4 py-2 text-center">Dokumentasi</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $item)
                <tr class="border bg-gray-100 hover:bg-gray-200 text-center">
                    <td class="border px-4 py-2">{{ $item->project_name }}</td>
                    <td class="border px-4 py-2">{{ $item->lokasi }}</td>
                    <td class="border px-4 py-2">{{ $item->jumlah_tenaga_kerja }}</td>
                    <td class="border px-4 py-2">{{ $item->durasi }}</td>
                    <td class="border px-4 py-2">{{ $item->deskripsi }}</td>
                    <td class="border px-4 py-2">
                        @if($item->documentation)
                            <img src="{{ asset('storage/' . $item->documentation) }}" alt="Dokumentasi" class="w-20 h-20 object-cover mx-auto">
                            <a href="{{ asset('storage/' . $item->documentation) }}" target="_blank" 
                               class="text-blue-600 underline font-semibold block mt-1">Lihat</a>
                        @else
                            <span class="text-gray-500">Tidak Ada</span>
                        @endif
                    </td>
                    <!-- Aksi -->
                    <td class="border px-4 py-2">
                        <a href="{{ route('project.edit', $item->id) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded-md shadow">
                            Edit
                        </a>
                        <form action="{{ route('project.destroy', $item->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md shadow">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
</body>
</html>
