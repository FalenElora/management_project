<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyekCatatanPekerjaanController extends Controller
{
     public function index() {
        return ProyekCatatanPekerjaan::all();
    }

    public function store(Request $request) {
        $request->validate([
            'proyek_fitur_id' => 'required|exists:proyek_fitur,id',
            'user_id' => 'required|exists:user,id',
            'jenis' => 'required|string',
        ]);

        return ProyekCatatanPekerjaan::create($request->all());
    }

    public function show(ProyekCatatanPekerjaan $proyekCatatanPekerjaan) {
        return $proyekCatatanPekerjaan;
    }

    public function update(Request $request, ProyekCatatanPekerjaan $proyekCatatanPekerjaan) {
        $proyekCatatanPekerjaan->update($request->all());
        return $proyekCatatanPekerjaan;
    }

    public function destroy(ProyekCatatanPekerjaan $proyekCatatanPekerjaan) {
        $proyekCatatanPekerjaan->delete();
        return response()->noContent();
    }
}
