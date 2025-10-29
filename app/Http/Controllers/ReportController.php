<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    // Tampilkan semua laporan
    public function index()
    {
        $reports = Report::latest()->get();
        return view('reports.index', compact('reports'));
    }

    // Tampilkan form upload
    public function create()
    {
        return view('reports.create');
    }

    // Simpan data dan file
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'file' => 'required|mimes:jpg,jpeg,png|max:2048',
            'note' => 'nullable|string',
        ]);

        // Simpan file
        $path = $request->file('file')->store('reports', 'public');

        // Simpan data ke database
        Report::create([
            'location' => $request->location,
            'date' => $request->date,
            'note' => $request->note,
            'file_path' => $path,
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil diupload!');
    }
}
