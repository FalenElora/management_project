<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyekFiturUserController extends Controller
{
    public function index() {
        return ProyekFiturUser::all();
    }

    public function store(Request $request) {
        $request->validate([
            'proyek_fitur_id' => 'required|exists:proyek_fitur,id',
            'user_id' => 'required|exists:user,id',
        ]);

        return ProyekFiturUser::create($request->all());
    }

    public function show(ProyekFiturUser $proyekFiturUser) {
        return $proyekFiturUser;
    }

    public function update(Request $request, ProyekFiturUser $proyekFiturUser) {
        $proyekFiturUser->update($request->all());
        return $proyekFiturUser;
    }

    public function destroy(ProyekFiturUser $proyekFiturUser) {
        $proyekFiturUser->delete();
        return response()->noContent();
    }
}
