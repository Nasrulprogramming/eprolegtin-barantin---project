@extends('layouts.main')

@section('content')
<h2>Form Input Program Legislasi Karantina (E-Prolegtin)</h2>
<p>Silahkan isi data berikut dengan lengkap dan benar</p>
<form action="{{ route('form.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Unit Kerja Pemrakarsa</label>
    <input type="text" name="unit_kerja" placeholder="Contoh: Pusat Data dan Informasi" maxlength="150" class="form-control mb-2">

    <label for="">Jenis Regulasi</label>
    <select name="jenis_regulasi" class="form-select mb-2">
        <option value="peraturan">Undang - Undang</option>
        <option value="keputusan">Peraturan Pemerintah</option>
        <option value="instruksi">Peraturan Presiden</option>
        <option value="surat_edaran">Keputusan Presiden</option>
        <option value="peraturan_menteri">Intruksi Presiden</option>
        <option value="peraturan_bk">Peraturan Badan Karantina Indonesia</option>
        <option value="peraturan_kepala">Regulasi Lainnya</option>
    </select>

    <label>Usulan Judul Regulasi</label>
    <input type="text" name="usulan_judul" placeholder="Contoh: Peraturan tentang Digitalisasi Layanan Karantina" required maxlength="250" class="form-control mb-2">

    <label>Dasar Hukum</label>
    <input type="text" name="dasar_hukum" placeholder="Contoh: UU No. 21 Tahun 2019 tentang Karantina Hewan, Ikan dan Tumbuhan" required maxlength="250" class="form-control mb-2">

    <label>Deskripsi Singkat / Ruang Lingkup Rancangan Regulasi</label>
    <textarea name="deskripsi_singkat" placeholder="Tuliskan ringkasan tujuan dan urgensi regulasi" required maxlength="350" class="form-control mb-2"></textarea>

    <label>Naskah Urgensi (.doc/.pdf max 5Mb)</label>
    <a href="/templates/Sertifikat Junior Web Dev.pdf" class="d-block mb-2 text-primary" target="_blank">
        📄 Download Template Naskah Urgensi
    </a>
    <input type="file" name="naskah_urgensi" class="form-control mb-3">

    <label>Rancangan Regulasi (.doc/.pdf max 5Mb)</label>
    <a href="/templates/naskah-urgensi.docx" class="d-block mb-2 text-primary" target="_blank">
        📄 Download Template Rancangan Regulasi
    </a>
    <input type="file" name="naskah_urgensi" class="form-control mb-3">


    <button type="submit" class="btn btn-success">Kirim</button>
</form>
@endsection