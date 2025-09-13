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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('unit_kerja', 150);          // Unit Kerja Pemrakarsa
            $table->string('usulan_judul', 250);        // Usulan Judul Regulasi
            $table->string('dasar_hukum', 250);         // Dasar Hukum
            $table->string('deskripsi_singkat', 350);   // Deskripsi Singkat
            $table->string('file_path')->nullable();    // Path file upload
            $table->string('file_original_name')->nullable();
            $table->unsignedInteger('file_downloads')->default(0); // Counter download
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
