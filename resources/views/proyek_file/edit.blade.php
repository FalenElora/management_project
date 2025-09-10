@extends('layouts.app')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-xl font-semibold text-gray-700 mb-6">✏️ Edit Proyek File</h1>

    <form action="{{ route('proyek_file.update', $file->id) }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-medium">Nama File</label>
            <input type="text" name="nama_file" value="{{ old('nama_file', $file->nama_file) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                   required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Keterangan</label>
            <textarea name="keterangan" rows="3"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">{{ old('keterangan', $file->keterangan) }}</textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Path</label>
            <input type="text" name="path" value="{{ old('path', $file->path) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                   required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">User ID</label>
            <input type="number" name="user_id" value="{{ old('user_id', $file->user_id) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                   required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Proyek ID</label>
            <input type="number" name="proyek_id" value="{{ old('proyek_id', $file->proyek_id) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                   required>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow">
                Update
            </button>
            <a href="{{ route('proyek_file.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 shadow">
               Batal
            </a>
        </div>
    </form>
</div>
@endsection
