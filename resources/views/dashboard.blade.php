@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">📊 Dashboard Admin</h1>

    {{-- ALERT --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    {{-- Statistik Regulasi --}}
    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card bg-light p-3 shadow-sm">
                <h2>{{ $usulan }}</h2>
                <p>📌 Usulan Regulasi</p>
                <a href="{{ route('admin.prolegs.index') }}" class="btn btn-sm btn-primary">Lihat Detail</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light p-3 shadow-sm">
                <h2>{{ $proses }}</h2>
                <p>⚙️ Regulasi Proses</p>
                <a href="{{ route('admin.prolegs.index') }}" class="btn btn-sm btn-primary">Lihat Detail</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light p-3 shadow-sm">
                <h2>{{ $diundangkan }}</h2>
                <p>✅ Regulasi Diundangkan</p>
                <a href="{{ route('admin.prolegs.index') }}" class="btn btn-sm btn-primary">Lihat Detail</a>
            </div>
        </div>
    </div>

    {{-- List Submission Terbaru --}}
    <div class="card shadow-sm">
        <div class="card-header">
            <h5>📝 Usulan Terbaru</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Unit Kerja</th>
                        <th>Judul Usulan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prolegs as $index => $proleg)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $proleg->unit_kerja ?? '-' }}</td>
                        <td>{{ $proleg->usulan_judul }}</td>
                        <td>
                            {{-- Dropdown untuk ubah status --}}
                            <form method="POST" action="{{ route('admin.prolegs.updateStatus', $proleg->id) }}">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="usulan" {{ $proleg->status == 'usulan' ? 'selected' : '' }}>Usulan</option>
                                    <option value="proses" {{ $proleg->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="diundangkan" {{ $proleg->status == 'diundangkan' ? 'selected' : '' }}>Diundangkan</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.prolegs.index') }}" class="btn btn-sm btn-outline-primary">
                                Kelola
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada usulan regulasi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection