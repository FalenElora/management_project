<?php

namespace App\Http\Controllers;

use App\Models\ProyekUser;
use App\Models\Proyek;
use App\Models\User;
use Illuminate\Http\Request;

class ProyekUserController extends Controller
{
    public function index()
    {
        $data = ProyekUser::with(['proyek','user'])->get();
        return view('proyek_user.index', compact('data'));
    }

    public function create()
    {
        $proyek = Proyek::all();
        $users = User::all();
        return view('proyek_user.create', compact('proyek', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required',
            'user_id'   => 'required',
            'sebagai'   => 'required',
            'keterangan'=> 'nullable',
        ]);

        ProyekUser::create($request->all());

        return redirect()->route('proyek_user.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(ProyekUser $proyekUser)
    {
        $proyek = Proyek::all();
        $users = User::all();
        return view('proyek_user.edit', compact('proyekUser','proyek','users'));
    }

    public function update(Request $request, ProyekUser $proyekUser)
    {
        $request->validate([
            'proyek_id' => 'required',
            'user_id'   => 'required',
            'sebagai'   => 'required',
            'keterangan'=> 'nullable',
        ]);

        $proyekUser->update($request->all());

        return redirect()->route('proyek_user.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(ProyekUser $proyekUser)
    {
        $proyekUser->delete();
        return redirect()->route('proyek_user.index')->with('success', 'Data berhasil dihapus.');
    }
}
