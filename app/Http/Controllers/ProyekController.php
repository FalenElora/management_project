<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
  
    public function index()
    {
        $proyek = Proyek::with('customer')->get();
        return view('proyek.index', compact('proyek'));
    }

   
    public function create()
    {
        $customers = Customer::all();
        return view('proyek.create', compact('customers'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek'     => 'required|string|max:255',
            'customer_id'     => 'required|exists:customer,id',
            'deskripsi'       => 'required|string',
            'lokasi'          => 'required|string|max:255',
            'tanggal_mulai'   => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'anggaran'        => 'required|numeric|min:0',
            'status'          => 'required|in:belum_dimulai,sedang_berjalan,selesai,ditunda',
        ]);

        Proyek::create($request->all());

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan');
    }

   
    public function show(Proyek $proyek)
    {
        return view('proyek.show', compact('proyek'));
    }

   
    public function edit(Proyek $proyek)
    {
        $customers = Customer::all();
        return view('proyek.edit', compact('proyek', 'customers'));
    }

  
    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([
            'nama_proyek'     => 'required|string|max:255',
            'customer_id'     => 'required|exists:customer,id',
            'deskripsi'       => 'required|string',
            'lokasi'          => 'required|string|max:255',
            'tanggal_mulai'   => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'anggaran'        => 'required|numeric|min:0',
            'status'          => 'required|in:belum_dimulai,sedang_berjalan,selesai,ditunda',
        ]);

        $proyek->update($request->all());

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil diupdate');
    }

   
    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil dihapus');
    }
}
