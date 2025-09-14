@extends('layouts.app')

@section('title', 'Tambah File Proyek')

@section('content')
<div class="max-w-2xl mx-auto mt-6 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Tambah File Proyek</h2>

    <form action="{{ route('proyek_file.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Nama File</label>
            <input type="text" name="nama_file" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Keterangan</label>
            <textarea name="keterangan" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div>
            <label class="block font-medium">Upload File</label>
            <input type="file" name="path" class="w-full border rounded px-3 py-2" required>
            <p class="text-sm text-gray-500">Format: pdf, jpg, jpeg, png | Max: 2MB</p>
        </div>

        <div>
            <label class="block font-medium">Proyek</label>
            <select name="proyek_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Proyek --</option>
                @foreach($proyek as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_proyek }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium">User</label>
            <select name="user_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('proyek_file.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
        </div>
    </form>
</div>
@endsection
