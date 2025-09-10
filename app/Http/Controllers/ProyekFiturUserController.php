<?php

namespace App\Http\Controllers;

use App\Models\ProyekFiturUser;
use App\Models\ProyekFitur;
use App\Models\User;
use Illuminate\Http\Request;

class ProyekFiturUserController extends Controller
{
    /**
     * Tampilkan semua Proyek Fitur User
     */
    public function index()
    {
        $proyekFiturUser = ProyekFiturUser::with(['proyekFitur', 'user'])->latest()->get();
        return view('proyek_fitur_user.index', compact('proyekFiturUser'));
    }

    /**
     * Form tambah
     */
    public function create()
    {
        $proyekFitur = ProyekFitur::all();
        $users = User::all();

        return view('proyek_fitur_user.create', compact('proyekFitur', 'users'));
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyek_fitur_id' => 'required|integer|exists:proyek_fitur,id',
            'user_id'         => 'required|integer|exists:users,id',
            'keterangan'      => 'nullable|string',
        ]);

        ProyekFiturUser::create($validated);

        return redirect()->route('proyek_fitur_user.index')
                         ->with('success', 'Proyek Fitur User berhasil ditambahkan!');
    }

    /**
     * Form edit
     */
    public function edit(ProyekFiturUser $proyekFiturUser)
    {
        $proyekFitur = ProyekFitur::all();
        $users = User::all();

        return view('proyek_fitur_user.edit', compact('proyekFiturUser', 'proyekFitur', 'users'));
    }

    /**
     * Update data
     */
    public function update(Request $request, ProyekFiturUser $proyekFiturUser)
    {
        $validated = $request->validate([
            'proyek_fitur_id' => 'required|integer|exists:proyek_fitur,id',
            'user_id'         => 'required|integer|exists:users,id',
            'keterangan'      => 'nullable|string',
        ]);

        $proyekFiturUser->update($validated);

        return redirect()->route('proyek_fitur_user.index')
                         ->with('success', 'Proyek Fitur User berhasil diperbarui!');
    }

    /**
     * Hapus data
     */
    public function destroy(ProyekFiturUser $proyekFiturUser)
    {
        $proyekFiturUser->delete();

        return redirect()->route('proyek_fitur_user.index')
                         ->with('success', 'Proyek Fitur User berhasil dihapus!');
    }
}
