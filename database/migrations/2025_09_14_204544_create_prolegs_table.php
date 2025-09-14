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
        Schema::create('prolegs', function (Blueprint $table) {
            $table->id();
            $table->string('unit_kerja', 150)->nullable();
            $table->string('jenis_regulasi', 100)->nullable();
            $table->string('usulan_judul', 250);
            $table->string('dasar_hukum', 250);
            $table->text('deskripsi_singkat');
            $table->string('naskah_urgensi')->nullable();
            $table->string('rancangan_regulasi')->nullable();
            $table->enum('status', ['usulan', 'proses', 'diundangkan'])->default('usulan');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prolegs');
    }
};
