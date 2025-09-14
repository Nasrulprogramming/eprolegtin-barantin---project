@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">👨‍💼 Manajemen Admin</h1>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- ALERT ERROR --}}
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Tombol tambah admin --}}
    <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">+ Tambah Admin</a>

    {{-- Tabel daftar admin --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    {{-- Tombol hapus --}}
                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus admin ini?')" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">🗑 Hapus</button>
                    </form>
                </td>
                <td>
                    {{-- Tombol Hapus --}}
                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin mau hapus admin ini?')">Hapus</button>
                    </form>

                    {{-- Tombol Reset Password (khusus superadmin) --}}
                    @if(auth('admin')->user()->email === 'superadmin@example.com')
                    <a href="{{ route('admin.reset.form', $admin->id) }}"
                        class="btn btn-warning btn-sm">Reset Password</a>
                    @endif
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada admin</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection