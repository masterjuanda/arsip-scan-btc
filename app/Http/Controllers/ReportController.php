<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function destroy($id)
    {
        $report = Report::findOrFail($id);

        // Hapus file gambar dari storage
        if ($report->file_path && Storage::exists('public/' . $report->file_path)) {
            Storage::delete('public/' . $report->file_path);
        }

        // Hapus data dari database
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
