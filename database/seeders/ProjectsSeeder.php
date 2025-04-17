<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        DB::table('users')->truncate();
        // Seeder untuk tabel users
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Gantilah password sesuai kebutuhan
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seeder untuk tabel projects
        DB::table('projects')->insert([
            [
                'project_name' => 'Proyek A',
                'lokasi' => 'Jakarta',
                'jumlah_tenaga_kerja' => 10,
                'durasi' => 30,
                'deskripsi' => 'Deskripsi proyek A',
                'documentation' => 'proyek_a.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_name' => 'Proyek B',
                'lokasi' => 'Bandung',
                'manpower' => 15,
                'durasi' => 45,
                'deskripsi' => 'Deskripsi proyek B',
                'documentation' => 'proyek_b.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
