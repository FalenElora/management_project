<?php

namespace App\Http\Controllers;

use App\Models\ProyekInvoice;
use App\Models\Proyek; // 🔹 tambahin ini
use Illuminate\Http\Request;

class ProyekInvoiceController extends Controller
{
    public function index()
    {
        $invoices = ProyekInvoice::with('proyek')->latest()->paginate(10); // biar bisa akses nama_proyek juga
        return view('proyek_invoice.index', compact('invoices'));
    }

    public function create()
    {
        $proyeks = Proyek::all(); // 🔹 ambil data proyek untuk dropdown
        return view('proyek_invoice.create', compact('proyeks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_invoice' => 'required|unique:proyek_invoice',
            'proyek_id' => 'required|integer|exists:proyek,id', // 🔹 validasi proyek harus ada
            'judul_invoice' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'tanggal_invoice' => 'required|date',
            'status' => 'required|in:belum_dibayar,diproses,dibayar',
        ]);

        ProyekInvoice::create($request->all());

        return redirect()->route('proyek_invoice.index')->with('success', 'Invoice berhasil ditambahkan.');
    }

    public function show(ProyekInvoice $proyek_invoice)
    {
        return view('proyek_invoice.show', compact('proyek_invoice'));
    }

    public function edit(ProyekInvoice $proyek_invoice)
    {
        $proyeks = Proyek::all(); // 🔹 supaya dropdown proyek juga muncul di edit
        return view('proyek_invoice.edit', compact('proyek_invoice', 'proyeks'));
    }

    public function update(Request $request, ProyekInvoice $proyek_invoice)
    {
        $request->validate([
            'judul_invoice' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'tanggal_invoice' => 'required|date',
            'status' => 'required|in:belum_dibayar,diproses,dibayar',
        ]);

        $proyek_invoice->update($request->all());

        return redirect()->route('proyek_invoice.index')->with('success', 'Invoice berhasil diperbarui.');
    }

    public function destroy(ProyekInvoice $proyek_invoice)
    {
        $proyek_invoice->delete();
        return redirect()->route('proyek_invoice.index')->with('success', 'Invoice berhasil dihapus.');
    }
}
