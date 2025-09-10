<?php

namespace App\Http\Controllers;

use App\Models\ProyekCatatanPekerjaan;
use App\Models\ProyekFitur;
use Illuminate\Http\Request;

class ProyekCatatanPekerjaanController extends Controller
{
    public function index()
    {
        $catatan = ProyekCatatanPekerjaan::with('proyekFitur')->get();
        return view('proyek_catatan_pekerjaan.index', compact('catatan'));
    }

    public function create()
    {
        $proyekFitur = ProyekFitur::all(); 
        return view('proyek_catatan_pekerjaan.create', compact('proyekFitur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_fitur_id' => 'required|integer',
            'catatan'         => 'required|string',
        ]);

        ProyekCatatanPekerjaan::create($request->all());

        return redirect()->route('proyek_catatan_pekerjaan.index')
                         ->with('success', 'Catatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $catatan = ProyekCatatanPekerjaan::findOrFail($id);
        $proyekFitur = ProyekFitur::all(); 

        return view('proyek_catatan_pekerjaan.edit', compact('catatan', 'proyekFitur'));
    }

    public function update(Request $request, ProyekCatatanPekerjaan $proyekCatatanPekerjaan)
    {
        $request->validate([
            'proyek_fitur_id' => 'required|integer',
            'catatan'         => 'required|string',
        ]);

        $proyekCatatanPekerjaan->update($request->all());

        return redirect()->route('proyek_catatan_pekerjaan.index')
                         ->with('success', 'Catatan berhasil diperbarui');
    }

    public function destroy(ProyekCatatanPekerjaan $proyekCatatanPekerjaan)
    {
        $proyekCatatanPekerjaan->delete();

        return redirect()->route('proyek_catatan_pekerjaan.index')
                         ->with('success', 'Catatan berhasil dihapus');
    }
}
