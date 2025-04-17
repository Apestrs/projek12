<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // auto-increment dan primary key
            $table->string('project_name');
            $table->string('documentation')->nullable();
            $table->string('lokasi');
            $table->integer('jumlah_tenaga_kerja')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('durasi')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
