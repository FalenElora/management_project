<?php

namespace App\Http\Controllers;

use App\Models\ProyekFitur;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekFiturController extends Controller
{
        public function index()
    {
        $proyekFitur = ProyekFitur::with('proyek')->latest()->get(); 
        return view('proyek_fitur.index', compact('proyekFitur'));
    }

    public function create()
    {
        $proyekFitur = Proyek::all();
        return view('proyek_fitur.create', compact('proyekFitur'));
    }


   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyek_id'    => 'required|exists:proyek,id',
            'nama_fitur'   => 'required|string|max:255',
            'keterangan'   => 'nullable|string',
            'status_fitur' => 'required|string|max:50',
        ]);

        ProyekFitur::create($validated);

        return redirect()
            ->route('proyek_fitur.index')
            ->with('success', 'Fitur berhasil ditambahkan!');
    }

    
    public function show(ProyekFitur $proyekFitur)
    {
        return view('proyek_fitur.show', compact('proyekFitur'));
    }

    
    public function edit(ProyekFitur $proyekFitur)
    {
        $proyekFitur = Proyek::all();
        return view('proyek_fitur.edit', compact('proyekFitur', 'proyek'));
    }

   
    public function update(Request $request, ProyekFitur $proyekFitur)
    {
        $validated = $request->validate([
            'proyek_id'    => 'required|exists:proyek,id',
            'nama_fitur'   => 'required|string|max:255',
            'keterangan'   => 'nullable|string',
            'status_fitur' => 'required|string|max:50',
        ]);

        $proyekFitur->update($validated);

        return redirect()
            ->route('proyek_fitur.index')
            ->with('success', 'Fitur berhasil diperbarui!');
    }

   
    public function destroy(ProyekFitur $proyekFitur)
    {
        $proyekFitur->delete();

        return redirect()
            ->route('proyek_fitur.index')
            ->with('success', 'Fitur berhasil dihapus!');
    }
}
