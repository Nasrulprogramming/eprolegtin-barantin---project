<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Proleg;

class SubmissionController extends Controller
{
    // Slide 1 → Statistik Regulasi
    // Slide 1 → Statistik Regulasi
    public function slide1()
    {
        $totalUsulan = \App\Models\Proleg::count(); // jumlah semua regulasi yang pernah diinput
        $proses = \App\Models\Proleg::where('status', 'proses')->count();
        $diundangkan = \App\Models\Proleg::where('status', 'diundangkan')->count();

        return view('slide1', [
            'usulan' => $totalUsulan,
            'proses' => $proses,
            'diundangkan' => $diundangkan,
        ]);
    }


    // Form (Slide 2)
    public function create()
    {
        return view('form');
    }

    // Simpan data form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit_kerja' => 'required|string|max:150',
            'usulan_judul' => 'required|string|max:250',
            'dasar_hukum' => 'required|string|max:250',
            'deskripsi_singkat' => 'required|string|max:350',
            'naskah_urgensi' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Default status = usulan
        // Tambahin status default
        $validated['status'] = 'usulan';

        // Simpan ke tabel prolegs
        Proleg::create($validated);

        return redirect()->route('submit.thanks')->with('success', 'Data berhasil dikirim!');
    }


    // Halaman terima kasih
    public function thanks()
    {
        return view('thanks');
    }

    // Download file
    public function downloadFile(Submission $submission)
    {
        if (!$submission->file_path || !Storage::disk('public')->exists($submission->file_path)) {
            abort(404, 'File tidak ditemukan');
        }

        $submission->increment('file_downloads'); // nambah counter download

        $filePath = Storage::disk('public')->path($submission->file_path);
        return response()->download(
            $filePath,
            $submission->file_original_name ?? 'naskah'
        );
    }

    // Detail submission untuk admin
    public function show($id)
    {
        $submission = Submission::findOrFail($id);
        return view('admin.show', compact('submission'));
    }
}
