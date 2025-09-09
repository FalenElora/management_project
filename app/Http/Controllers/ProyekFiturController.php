<?php

namespace App\Http\Controllers;

use App\Models\ProyekFitur;
use Illuminate\Http\Request;

class ProyekFiturController extends Controller
{
    /**
     * Tampilkan semua fitur
     */
    public function index()
    {
        $proyekFitur = ProyekFitur::latest()->get(); // pakai latest biar data terbaru muncul dulu
        return view('proyek_fitur.index', compact('proyekFitur'));
    }

    /**
     * Form tambah fitur
     */
    public function create()
    {
        return view('proyek_fitur.create');
    }

    /**
     * Simpan fitur baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyek_id'    => 'required|integer',
            'nama_fitur'   => 'required|string|max:255',
            'keterangan'   => 'nullable|string',
            'status_fitur' => 'required|string|max:50',
        ]);

        ProyekFitur::create($validated);

        return redirect()
            ->route('proyek_fitur.index')
            ->with('success', 'Fitur berhasil ditambahkan!');
    }

    /**
     * Detail fitur
     */
    public function show(ProyekFitur $proyekFitur)
    {
        return view('proyek_fitur.show', compact('proyekFitur'));
    }

    /**
     * Form edit fitur
     */
    public function edit(ProyekFitur $proyekFitur)
    {
        return view('proyek_fitur.edit', compact('proyekFitur'));
    }

    /**
     * Update fitur
     */
    public function update(Request $request, ProyekFitur $proyekFitur)
    {
        $validated = $request->validate([
            'nama_fitur'   => 'required|string|max:255',
            'keterangan'   => 'nullable|string',
            'status_fitur' => 'required|string|max:50',
        ]);

        $proyekFitur->update($validated);

        return redirect()
            ->route('proyek_fitur.index')
            ->with('success', 'Fitur berhasil diperbarui!');
    }

    /**
     * Hapus fitur
     */
    public function destroy(ProyekFitur $proyekFitur)
    {
        $proyekFitur->delete();

        return redirect()
            ->route('proyek_fitur.index')
            ->with('success', 'Fitur berhasil dihapus!');
    }
}
