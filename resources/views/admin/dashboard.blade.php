@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">📊 Dashboard Admin</h1>
    <p>Daftar Submission User</p>

    <div class="mb-3">
        <a href="{{ route('admin.export.excel') }}" class="btn btn-success">Export Excel</a>
        <a href="{{ route('admin.export.csv') }}" class="btn btn-primary">Export CSV</a>
        <a href="{{ route('admin.export.pdf') }}" class="btn btn-danger">Export PDF</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Unit Kerja</th>
                <th>Judul Regulasi</th>
                <th>Dasar Hukum</th>
                <th>Deskripsi</th>
                <th>File</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions as $submission)
            <tr>
                <!-- <td>{{ $loop->iteration }}</td> Nomor urut rapih -->
                <td>{{ $submission->unit_kerja }}</td>
                <td>{{ $submission->usulan_judul }}</td>
                <td>{{ $submission->dasar_hukum }}</td>
                <td>{{ $submission->deskripsi_singkat }}</td>
                <td>
                    @if($submission->file_path)
                    <a href="{{ asset('storage/'.$submission->file_path) }}" target="_blank">📂 Lihat File</a>
                    @else
                    -
                    @endif
                <td>{{ $submission->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="{{ asset('storage/'.$submission->file_path) }}"
                        download="{{ $submission->file_original_name }}"
                        class="btn btn-sm btn-outline-primary">⬇️ Download</a>
                    <a href="{{ route('form.show', $submission->id) }}" class="btn btn-sm btn-outline-info">👁 Lihat</a>
                    <!-- Tombol Hapus -->
                    <form action="{{ route('admin.submission.destroy', $submission->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin mau hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">🗑 Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection