<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubmissionsExport;

class SubmissionAdminController extends Controller
{
    public function index()
    {
        $submissions = Submission::latest()->paginate(15);
        return view('admin.submissions.index', compact('submissions'));
    }

    public function show(Submission $submission)
    {
        return view('admin.submissions.show', compact('submission'));
    }

    public function destroy(Submission $submission)
    {
        if ($submission->file_path && Storage::disk('public')->exists($submission->file_path)) {
            Storage::disk('public')->delete($submission->file_path);
        }
        $submission->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function downloadNaskah(Submission $submission)
    {
        return app(\App\Http\Controllers\SubmissionController::class)->downloadFile($submission);
    }

    public function exportExcel()
    {
        return Excel::download(new SubmissionsExport, 'submissions.xlsx');
    }
}
