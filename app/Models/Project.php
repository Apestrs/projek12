<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects'; // Pastikan ini sesuai dengan nama tabel

    protected $fillable = [
        'project_name', 
        'deskripsi', 
        'lokasi', 
        'jumlah_tenaga_kerja', // Pastikan konsisten dengan database
        'durasi', 
        'documentation'
    ];

    // Contoh jika proyek memiliki banyak tugas (tasks)
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
