@extends('layouts.app')

@section('title', 'Tambah Catatan Pekerjaan')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded p-6 mt-6">
    <h2 class="text-xl font-bold mb-4">Tambah Catatan Pekerjaan</h2>

    <form action="{{ route('proyek_catatan_pekerjaan.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Pilih Proyek Fitur --}}
        <div>
            <label class="block font-semibold">Proyek Fitur</label>
            <select name="proyek_fitur_id" class="w-full border p-2 rounded" required>
                <option value="" disabled selected>Pilih Fitur</option>
                @foreach($proyekFitur as $fitur)
                    <option value="{{ $fitur->id }}">{{ $fitur->nama_fitur }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Jenis --}}
        <div>
            <label class="block font-semibold">Jenis</label>
            <select name="jenis" class="w-full border p-2 rounded" required>
                <option value="" disabled selected>Pilih Jenis</option>
                <option value="pekerjaan">Pekerjaan</option>
                <option value="bug">Bug</option>
            </select>
        </div>

        {{-- Catatan --}}
        <div>
            <label class="block font-semibold">Catatan</label>
            <textarea name="catatan" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('proyek_catatan_pekerjaan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
        </div>
    </form>
</div>
@endsection
