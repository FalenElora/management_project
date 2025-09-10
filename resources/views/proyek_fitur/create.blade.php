@extends('layouts.app')

@section('title', 'Tambah Proyek Fitur')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded">
    <h2 class="text-xl font-bold mb-4">Tambah Proyek Fitur</h2>

    {{-- tampilkan error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proyek_fitur.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Nama Fitur</label>
            <input type="text" name="nama_fitur" 
                   class="w-full border p-2 rounded" 
                   value="{{ old('nama_fitur') }}" required>
        </div>

        <div>
            <label class="block font-semibold">Keterangan</label>
            <textarea name="keterangan" 
                      class="w-full border p-2 rounded">{{ old('keterangan') }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Status</label>
            <select name="status_fitur" class="w-full border p-2 rounded">
                <option value="pending" {{ old('status_fitur') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="progress" {{ old('status_fitur') == 'progress' ? 'selected' : '' }}>Progress</option>
                <option value="done" {{ old('status_fitur') == 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>

        <input type="hidden" name="proyek_id" value="{{ $proyek_id ?? 1 }}">

        <div class="flex space-x-2">
            <button type="submit" 
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Simpan
            </button>
            <a href="{{ route('proyek_fitur.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
