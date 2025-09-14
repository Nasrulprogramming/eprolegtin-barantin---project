@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📑 Daftar Usulan Regulasi</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Unit Kerja</th>
                <th>Jenis Regulasi</th>
                <th>Usulan Judul</th>
                <th>Dasar Hukum</th>
                <th>Deskripsi Singkat</th>
                <th>File Naskah Urgensi</th>
                <th>File Rancangan Regulasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prolegs as $index => $proleg)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $proleg->unit_kerja ?? '-' }}</td>
                <td>{{ $proleg->jenis_regulasi }}</td>
                <td>{{ $proleg->usulan_judul }}</td>
                <td>{{ $proleg->dasar_hukum }}</td>
                <td>{{ $proleg->deskripsi_singkat }}</td>
                <td>
                    @if($proleg->naskah_urgensi)
                    <a href="{{ asset('storage/'.$proleg->naskah_urgensi) }}" target="_blank">
                        {{ $proleg->naskah_urgensi_name }}
                    </a>
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if($proleg->rancangan_regulasi)
                    <a href="{{ asset('storage/'.$proleg->rancangan_regulasi) }}" target="_blank">
                        {{ $proleg->rancangan_regulasi_name }}
                    </a>
                    @else
                    -
                    @endif
                </td>
                <td>
                    <form action="{{ route('admin.prolegs.updateStatus', $proleg->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="usulan" {{ $proleg->status == 'usulan' ? 'selected' : '' }}>Usulan</option>
                            <option value="proses" {{ $proleg->status == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="diundangkan" {{ $proleg->status == 'diundangkan' ? 'selected' : '' }}>Diundangkan</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection