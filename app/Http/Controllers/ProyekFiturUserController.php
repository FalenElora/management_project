<?php

namespace App\Http\Controllers;

use App\Models\ProyekFiturUser;
use Illuminate\Http\Request;

class ProyekFiturUserController extends Controller
{
    public function index()
    {
        $proyekFiturUser = ProyekFiturUser::with(['proyekFitur', 'user'])->get();
        return view('proyek_fitur_user.index', compact('proyekFiturUser'));
    }

    public function create()
    {
        return view('proyek_fitur_user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_fitur_id' => 'required|integer',
            'user_id'         => 'required|integer',
            'keterangan'      => 'nullable|string',
        ]);

        ProyekFiturUser::create($request->all());

        return redirect()->route('proyek_fitur_user.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(ProyekFiturUser $proyekFiturUser)
    {
        return view('proyek_fitur_user.edit', compact('proyekFiturUser'));
    }

    public function update(Request $request, ProyekFiturUser $proyekFiturUser)
    {
        $request->validate([
            'proyek_fitur_id' => 'required|integer',
            'user_id'         => 'required|integer',
            'keterangan'      => 'nullable|string',
        ]);

        $proyekFiturUser->update($request->all());

        return redirect()->route('proyek_fitur_user.index')
                         ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(ProyekFiturUser $proyekFiturUser)
    {
        $proyekFiturUser->delete();

        return redirect()->route('proyek_fitur_user.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
