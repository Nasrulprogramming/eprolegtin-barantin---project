<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proleg extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_kerja',
        'jenis_regulasi',
        'usulan_judul',
        'dasar_hukum',
        'deskripsi_singkat',
        'naskah_urgensi',
        'rancangan_regulasi',
        'status',
    ];
}
