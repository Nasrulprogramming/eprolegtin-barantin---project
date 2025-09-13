@extends('layouts.main')

@section('content')
<h2>Form Input Program Legislasi (E-Prolegtin)</h2>
<form action="{{ route('form.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Unit Kerja</label>
    <input type="text" name="unit_kerja" required maxlength="150" class="form-control mb-2">

    <label>Usulan Judul Regulasi</label>
    <input type="text" name="usulan_judul" required maxlength="250" class="form-control mb-2">

    <label>Dasar Hukum</label>
    <input type="text" name="dasar_hukum" required maxlength="250" class="form-control mb-2">

    <label>Deskripsi Singkat</label>
    <textarea name="deskripsi_singkat" required maxlength="350" class="form-control mb-2"></textarea>

    <label>Naskah Urgensi (.doc/.pdf max 5Mb)</label>
    <input type="file" name="naskah_urgensi" class="form-control mb-3">

    <button type="submit" class="btn btn-success">Kirim</button>
</form>
@endsection