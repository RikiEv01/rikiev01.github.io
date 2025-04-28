<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Imports\SekolahImport;
use Maatwebsite\Excel\Facades\Excel;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = Sekolah::all();
        return view('admin.sekolah.index', compact('sekolahs'));
    }

    public function create()
    {
        return view('admin.sekolah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|unique:sekolahs,nama',
            'akreditasi' => 'required|in:A,B,C,Belum Terakreditasi',
            'ekskul' => 'required|integer',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'spp' => 'required|integer',
            'fasilitas' => 'required|in:Sangat Lengkap,Lengkap,Cukup Lengkap,Tidak Lengkap',
        ]);

        Sekolah::create($request->all());

        return redirect()->route('admin.sekolahs.index')->with('success', 'Sekolah berhasil ditambahkan.');
    }

    public function edit(Sekolah $sekolah)
    {
        return view('admin.sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, Sekolah $sekolah)
    {
        $request->validate([
            'nama' => 'required|string',
            'akreditasi' => 'required|in:A,B,C,Belum Terakreditasi',
            'ekskul' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'spp' => 'required|integer',
            'fasilitas' => 'required|in:Sangat Lengkap,Lengkap,Cukup Lengkap,Tidak Lengkap',
        ]);

        $sekolah->update($request->all());

        return redirect()->route('admin.sekolahs.index')->with('success', 'Sekolah berhasil diperbarui.');
    }

    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();

        return redirect()->route('admin.sekolahs.index')->with('success', 'Sekolah dihapus.');
    }

    public function showImportForm()
{
    return view('admin.sekolah.import');
}

public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,csv',
    ]);

    try {
        Excel::import(new SekolahImport, $request->file('file'));
        return redirect()->route('admin.sekolahs.index')->with('success', 'Import berhasil!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal mengimport file. Pastikan semua data lengkap & format benar!');
    }
}
}