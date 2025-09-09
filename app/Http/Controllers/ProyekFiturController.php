<?php

namespace App\Http\Controllers;

use App\Models\ProyekFitur;
use Illuminate\Http\Request;

class ProyekFiturController extends Controller
{
    // Tampilkan semua fitur
    public function index()
    {
        $proyekFitur = ProyekFitur::all();
        return view('proyek_fitur.index', compact('proyekFitur'));
    }

    // Form tambah fitur
    public function create()
    {
        return view('proyek_fitur.create');
    }

    // Simpan fitur baru
    public function store(Request $request)
    {
        $request->validate([
            'proyek_id'   => 'required|integer',
            'nama_fitur'  => 'required|string|max:255',
            'keterangan'  => 'nullable|string',
            'status_fitur'=> 'required|string'
        ]);

        ProyekFitur::create($request->all());

        return redirect()->route('proyek-fitur.index')
                         ->with('success', 'Fitur berhasil ditambahkan!');
    }

    // Detail fitur
    public function show(ProyekFitur $proyekFitur)
    {
        return view('proyek_fitur.show', compact('proyekFitur'));
    }

    // Form edit fitur
    public function edit(ProyekFitur $proyekFitur)
    {
        return view('proyek_fitur.edit', compact('proyekFitur'));
    }

    // Update fitur
    public function update(Request $request, ProyekFitur $proyekFitur)
    {
        $request->validate([
            'nama_fitur'  => 'required|string|max:255',
            'keterangan'  => 'nullable|string',
            'status_fitur'=> 'required|string'
        ]);

        $proyekFitur->update($request->all());

        return redirect()->route('proyek-fitur.index')
                         ->with('success', 'Fitur berhasil diperbarui!');
    }

    // Hapus fitur
    public function destroy(ProyekFitur $proyekFitur)
    {
        $proyekFitur->delete();

        return redirect()->route('proyek-fitur.index')
                         ->with('success', 'Fitur berhasil dihapus!');
    }
}
