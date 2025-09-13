<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    // Slide 1 → tampil total download
    public function slide1()
    {
        $totalDownloads = Submission::sum('file_downloads');
        return view('slide1', compact('totalDownloads'));
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

        $filePath = null;
        $originalName = null;

        if ($request->hasFile('naskah_urgensi')) {
            $file = $request->file('naskah_urgensi');
            $originalName = $file->getClientOriginalName();
            $filePath = $file->store('naskah_urgensi', 'public');
        }

        Submission::create([
            'unit_kerja' => $validated['unit_kerja'],
            'usulan_judul' => $validated['usulan_judul'],
            'dasar_hukum' => $validated['dasar_hukum'],
            'deskripsi_singkat' => $validated['deskripsi_singkat'],
            'file_path' => $filePath,
            'file_original_name' => $originalName,
        ]);

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

        $submission->increment('file_downloads'); // nambah counter

        $filePath = Storage::disk('public')->path($submission->file_path);
        return response()->download(
            $filePath,
            $submission->file_original_name ?? 'naskah'
        );
    }

    public function show($id)
    {
        $submission = Submission::findOrFail($id);
        return view('admin.show', compact('submission'));
    }
}
