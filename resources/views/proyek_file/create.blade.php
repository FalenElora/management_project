@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-6">Tambah Proyek File</h2>

        <form action="{{ route('proyek_file.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Nama File</label>
                <input type="text" name="nama_file"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-teal-500 focus:border-teal-500" 
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Keterangan</label>
                <textarea name="keterangan" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-teal-500 focus:border-teal-500"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Path</label>
                <input type="text" name="path"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-teal-500 focus:border-teal-500" 
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">User ID</label>
                <input type="number" name="user_id"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-teal-500 focus:border-teal-500" 
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Proyek ID</label>
                <input type="number" name="proyek_id"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-teal-500 focus:border-teal-500" 
                       required>
            </div>

            <div class="flex space-x-2">
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
                <a href="{{ route('proyek_file.index') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
