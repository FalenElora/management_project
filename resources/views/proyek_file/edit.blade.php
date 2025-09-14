@extends('layouts.app')

@section('title', 'Edit File Proyek')

@section('content')
<div class="max-w-2xl mx-auto mt-6 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit File Proyek</h2>

    <form method="POST" action="{{ route('proyek_file.update', $file->id) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nama File</label>
            <input type="text" name="nama_file" value="{{ old('nama_file', $file->nama_file) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Keterangan</label>
            <textarea name="keterangan" class="w-full border rounded px-3 py-2">{{ old('keterangan', $file->keterangan) }}</textarea>
        </div>

        <div>
            <label class="block font-medium">Upload File (Opsional)</label>
            <input type="file" name="path" class="w-full border rounded px-3 py-2">
            @if($file->path)
                <p class="text-sm mt-1">
                    File saat ini: 
                    <a href="{{ asset('storage/'.$file->path) }}" target="_blank" class="text-blue-600 underline">Lihat</a>
                </p>
            @endif
        </div>

        <div>
            <label class="block font-medium">Proyek</label>
            <select name="proyek_id" class="w-full border rounded px-3 py-2" required>
                @foreach($proyek as $p)
                    <option value="{{ $p->id }}" {{ $file->proyek_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_proyek }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium">User</label>
            <select name="user_id" class="w-full border rounded px-3 py-2" required>
                @foreach($users as $u)
                    <option value="{{ $u->id }}" {{ $file->user_id == $u->id ? 'selected' : '' }}>
                        {{ $u->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('proyek_file.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
        </div>
    </form>
</div>
@endsection
