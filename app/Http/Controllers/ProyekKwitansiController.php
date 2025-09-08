<?php

namespace App\Http\Controllers;

use App\Models\ProyekKwitansi;
use App\Models\Proyek; // <<< jangan lupa ini
use Illuminate\Http\Request;

class ProyekKwitansiController extends Controller
{
    public function index()
    {
        $data = ProyekKwitansi::with('proyek')->latest()->get();
        return view('proyek_kwitansi.index', compact('data'));
    }

    public function create()
    {
        // ambil daftar proyek untuk select
        $proyek = Proyek::orderBy('nama_proyek')->get(); // ubah kolom jika nama berbeda
        return view('proyek_kwitansi.create', compact('proyek'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_kwitansi' => 'required|unique:proyek_kwitansi,nomor_kwitansi',
            'nomor_invoice'  => 'required|unique:proyek_kwitansi,nomor_invoice',
            'proyek_id'      => 'required|exists:proyek,id',
            'judul_kwitansi' => 'required|string',
            'jumlah'         => 'required|numeric',
            'tanggal_kwitansi'=> 'required|date',
            'keterangan'     => 'nullable|string',
        ]);

        ProyekKwitansi::create($validated);
        return redirect()->route('proyek_kwitansi.index')->with('success','Kwitansi berhasil ditambah');
    }

    public function edit($id)
    {
        $data = ProyekKwitansi::findOrFail($id);
        $proyek = Proyek::orderBy('nama_proyek')->get();
        return view('proyek_kwitansi.edit', compact('data','proyek'));
    }

    public function update(Request $request, $id)
    {
        $data = ProyekKwitansi::findOrFail($id);

        $validated = $request->validate([
            'nomor_kwitansi' => 'required|unique:proyek_kwitansi,nomor_kwitansi,'.$data->id,
            'nomor_invoice'  => 'required|unique:proyek_kwitansi,nomor_invoice,'.$data->id,
            'proyek_id'      => 'required|exists:proyek,id',
            'judul_kwitansi' => 'required|string',
            'jumlah'         => 'required|numeric',
            'tanggal_kwitansi'=> 'required|date',
            'keterangan'     => 'nullable|string',
        ]);

        $data->update($validated);
        return redirect()->route('proyek_kwitansi.index')->with('success','Kwitansi berhasil diperbarui');
    }

    public function destroy($id)
    {
        ProyekKwitansi::findOrFail($id)->delete();
        return redirect()->route('proyek_kwitansi.index')->with('success','Kwitansi dihapus');
    }
}
