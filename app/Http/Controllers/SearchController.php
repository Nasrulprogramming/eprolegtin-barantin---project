<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('q');
        $category = $request->input('category');

        $query = Submission::query();

        if ($keyword) {
            $query->where('usulan_judul', 'like', "%$keyword%")
                ->orWhere('unit_kerja', 'like', "%$keyword%")
                ->orWhere('dasar_hukum', 'like', "%$keyword%")
                ->orWhere('deskripsi_singkat', 'like', "%$keyword%");
        }

        // kalau kategori dipilih
        if ($category && $category != 'all') {
            $query->where('kategori', $category);
            // pastikan field `kategori` ada di tabel submissions
        }

        $results = $query->paginate(10);

        return view('search.results', compact('results', 'keyword', 'category'));
    }
}
