<?php

namespace App\Http\Controllers;

use App\Models\ProyekFile;
use App\Models\Proyek;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekFileController extends Controller
{
   
    public function index()
    {
        $files = ProyekFile::with(['user', 'proyek'])->get();
        return view('proyek_file.index', compact('files'));
    }

  
    public function create()
    {
        $proyek = Proyek::all();
        $users = User::all();
        return view('proyek_file.create', compact('proyek', 'users'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_file'  => 'required',
            'keterangan' => 'nullable|string',
            'path'       => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'proyek_id'  => 'required|integer',
            'user_id'    => 'required|integer',
        ]);

        $filePath = null;

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('projects', $filename, 'public');
        }

        ProyekFile::create([
            'nama_file'  => $request->nama_file,
            'keterangan' => $request->keterangan,
            'path'       => $filePath,
            'proyek_id'  => $request->proyek_id,
            'user_id'    => $request->user_id,
        ]);

        return redirect()->route('proyek_file.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    
    public function edit($id)
    {
        $file   = ProyekFile::findOrFail($id);
        $proyek = Proyek::all();
        $users  = User::all();
        return view('proyek_file.edit', compact('file', 'proyek', 'users'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_file'  => 'required',
            'keterangan' => 'nullable|string',
            'path'       => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'proyek_id'  => 'required|integer',
            'user_id'    => 'required|integer',
        ]);

        $file = ProyekFile::findOrFail($id);

        $filePath = $file->path; 

        if ($request->hasFile('path')) {
           
            if ($file->path && Storage::disk('public')->exists($file->path)) {
                Storage::disk('public')->delete($file->path);
            }

            $uploadedFile = $request->file('path');
            $filename = time() . '_' . $uploadedFile->getClientOriginalName();
            $filePath = $uploadedFile->storeAs('projects', $filename, 'public');
        }

        $file->update([
            'nama_file'  => $request->nama_file,
            'keterangan' => $request->keterangan,
            'path'       => $filePath,
            'proyek_id'  => $request->proyek_id,
            'user_id'    => $request->user_id,
        ]);

        return redirect()->route('proyek_file.index')
                         ->with('success', 'Data berhasil diupdate');
    }

   
    public function destroy($id)
    {
        $file = ProyekFile::findOrFail($id);

       
        if ($file->path && Storage::disk('public')->exists($file->path)) {
            Storage::disk('public')->delete($file->path);
        }

        $file->delete();

        return redirect()->route('proyek_file.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
