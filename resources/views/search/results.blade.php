@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Hasil Pencarian</h3>
    @if($keyword)
    <p>Menampilkan hasil untuk: <strong>{{ $keyword }}</strong></p>
    @endif

    @if($results->count() > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Unit Kerja</th>
                <th>Judul Regulasi</th>
                <th>Dasar Hukum</th>
                <th>Deskripsi Singkat</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $r)
            <tr>
                <td>{{ $r->unit_kerja }}</td>
                <td>{{ $r->usulan_judul }}</td>
                <td>{{ $r->dasar_hukum }}</td>
                <td>{{ $r->deskripsi_singkat }}</td>
                <td>
                    @if($r->file_path)
                    <a href="{{ route('admin.submissions.download', $r) }}">Download</a>
                    @else
                    -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $results->links() }}
    @else
    <p class="text-muted">Tidak ada hasil ditemukan.</p>
    @endif
</div>
@endsection