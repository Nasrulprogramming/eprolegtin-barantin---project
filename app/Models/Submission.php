<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'unit_kerja',
        'usulan_judul',
        'dasar_hukum',
        'deskripsi_singkat',
        'file_path',
        'file_original_name',
        'file_downloads',
    ];
}
