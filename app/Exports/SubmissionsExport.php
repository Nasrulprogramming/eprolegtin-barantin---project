<?php

namespace App\Exports;

use App\Models\Submission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubmissionsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Submission::select(
            'id',
            'unit_kerja',
            'usulan_judul',
            'dasar_hukum',
            'deskripsi_singkat',
            'file_original_name',
            'file_downloads',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Unit Kerja',
            'Usulan Judul',
            'Dasar Hukum',
            'Deskripsi Singkat',
            'Nama File',
            'Jumlah Download',
            'Tanggal Input',
        ];
    }
}
