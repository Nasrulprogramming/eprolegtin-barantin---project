<?php

namespace App\Http\Controllers;

use App\Models\Proleg;
use Illuminate\Http\Request;


class ProlegController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit_kerja' => 'nullable|string|max:150',
            'jenis_regulasi' => 'required|string',
            'usulan_judul' => 'required|string|max:250',
            'dasar_hukum' => 'required|string|max:250',
            'deskripsi_singkat' => 'required|string|max:350',
            'naskah_urgensi' => 'nullable|file|mimes:doc,docx,pdf|max:5120',
            'rancangan_regulasi' => 'nullable|file|mimes:doc,docx,pdf|max:5120',
        ]);

        // Upload file kalau ada
        if ($request->hasFile('naskah_urgensi')) {
            $file = $request->file('naskah_urgensi');
            $validated['naskah_urgensi'] = $file->store('uploads', 'public');
            $validated['naskah_urgensi_name'] = $file->getClientOriginalName();
        }

        if ($request->hasFile('rancangan_regulasi')) {
            $file = $request->file('rancangan_regulasi');
            $validated['rancangan_regulasi'] = $file->store('uploads', 'public');
            $validated['rancangan_regulasi_name'] = $file->getClientOriginalName();
        }

        // Status default
        $validated['status'] = 'usulan';

        // Simpan ke database
        Proleg::create($validated);

        return redirect()->route('submit.thanks')->with('success', 'Data berhasil disimpan!');
    }

    public function adminIndex()
    {
        $prolegs = Proleg::latest()->get();
        return view('admin.prolegs.index', compact('prolegs'));
    }



    public function dashboard()
    {
        $submissions = \App\Models\Submission::latest()->get();
        $prolegs = \App\Models\Proleg::latest()->get();

        return view('admin.dashboard', compact('submissions', 'prolegs'));
    }

    public function index()
    {
        $prolegs = Proleg::latest()->paginate(10);
        return view('admin.prolegs.index', compact('prolegs'));
    }

    public function updateStatus(Request $request, $id)
    {
        $proleg = Proleg::findOrFail($id);
        $oldStatus = $proleg->status;

        $proleg->status = $request->status;
        $proleg->save();

        return back()->with(
            'success',
            "✅ Status regulasi berhasil diperbarui dari {$oldStatus} ke {$request->status}."
        );
    }
}
