@extends('layouts.admin')
@section('content')
<div class="container mt-5">
    <h2>📄 Detail Submission</h2>

    <table class="table table-bordered">
        <!-- <tr>
            <th>ID</th>
            <td>{{ $submission->id }}</td>
        </tr> -->
        <tr>
            <th>Unit Kerja</th>
            <td>{{ $submission->unit_kerja }}</td>
        </tr>
        <tr>
            <th>Judul</th>
            <td>{{ $submission->usulan_judul }}</td>
        </tr>
        <tr>
            <th>Dasar Hukum</th>
            <td>{{ $submission->dasar_hukum }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $submission->deskripsi_singkat }}</td>
        </tr>
        <tr>
            <th>File</th>
            <td>
                <a href="{{ asset('storage/'.$submission->file_path) }}" target="_blank">📂 Lihat File</a> |
                <a href="{{ asset('storage/'.$submission->file_path) }}"
                    download="{{ $submission->file_original_name }}"
                    class="btn btn-sm btn-outline-primary">⬇️ Download</a>
            </td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $submission->created_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
</div>
@endsection