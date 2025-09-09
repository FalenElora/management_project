<?php

namespace App\Http\Controllers;

use App\Models\ProyekFile;
use Illuminate\Http\Request;

class ProyekFileController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $files = ProyekFile::with(['user', 'proyek'])->get();
        return view('proyek_file.index', compact('files'));
    }

    // Form tambah data
    public function create()
    {
        return view('proyek_file.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_file' => 'required',
            'path' => 'required',
            'proyek_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        ProyekFile::create($request->all());

        return redirect()->route('proyek_file.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    // Form edit data
    public function edit($id)
    {
        $file = ProyekFile::findOrFail($id);
        return view('proyek_file.edit', compact('file'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_file' => 'required',
            'path' => 'required',
            'proyek_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $file = ProyekFile::findOrFail($id);
        $file->update($request->all());

        return redirect()->route('proyek_file.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    // Hapus data
    public function destroy($id)
    {
        $file = ProyekFile::findOrFail($id);
        $file->delete();

        return redirect()->route('proyek_file.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
