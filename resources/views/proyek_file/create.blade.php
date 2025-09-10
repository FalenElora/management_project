@extends('layouts.app')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-xl font-semibold text-gray-700 mb-6">➕ Tambah Proyek File</h1>

    <form action="{{ route('proyek_file.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-5">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium">Nama File</label>
            <input type="text" name="nama_file"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                   required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Keterangan</label>
            <textarea name="keterangan" rows="3"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"></textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Path</label>
            <input type="text" name="path"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                   required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">User ID</label>
            <input type="number" name="user_id"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                   required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Proyek ID</label>
            <input type="number" name="proyek_id"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                   required>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 shadow">
                Simpan
            </button>
            <a href="{{ route('proyek_file.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 shadow">
               Batal
            </a>
        </div>
    </form>
</div>
@endsection
