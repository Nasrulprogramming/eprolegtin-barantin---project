<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubmissionsExport;
use App\Models\Proleg;
use PDF;

class AdminController extends Controller
{
    public function index()
    {
        $submissions = Submission::latest()->paginate(10);
        return view('admin.dashboard', compact('submissions'));
    }

    public function exportExcel()
    {
        return Excel::download(new SubmissionsExport, 'submissions.xlsx');
    }

    public function exportCsv()
    {
        return Excel::download(new SubmissionsExport, 'submissions.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportPdf()
    {
        $submissions = Submission::all();
        $pdf = PDF::loadView('admin.export-pdf', compact('submissions'));
        return $pdf->download('submissions.pdf');
    }

    public function destroy($id)
    {
        $submission = Submission::findOrFail($id);

        // Hapus file dari storage
        if ($submission->file_path && \Storage::exists('public/' . $submission->file_path)) {
            \Storage::delete('public/' . $submission->file_path);
        }

        // Hapus dari database
        $submission->delete();

        return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus');
    }

    public function dashboard()
    {
        $submissions = Submission::latest()->get();
        $prolegs = Proleg::latest()->get();

        // Statistik
        $usulan = Proleg::where('status', 'usulan')->count();
        $proses = Proleg::where('status', 'proses')->count();
        $diundangkan = Proleg::where('status', 'diundangkan')->count();

        return view('admin.dashboard', compact('submissions', 'prolegs', 'usulan', 'proses', 'diundangkan'));
    }

    public function updateProlegStatus(Request $request, $id)
    {
        $proleg = Proleg::findOrFail($id);
        $proleg->status = $request->status;
        $proleg->save();

        return redirect()->back()->with('success', 'Status regulasi berhasil diupdate.');
    }
}
