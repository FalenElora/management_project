@extends('layouts.app')

@section('title', 'Edit Catatan Pekerjaan')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded p-6 mt-6">
    <h2 class="text-xl font-bold mb-4">Edit Catatan Pekerjaan</h2>

    <form action="{{ route('proyek_catatan_pekerjaan.update', $catatan->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Pilih Proyek Fitur --}}
        <div>
            <label class="block font-semibold">Proyek Fitur</label>
            <select name="proyek_fitur_id" class="w-full border p-2 rounded" required>
                @foreach($proyekFitur as $fitur)
                    <option value="{{ $fitur->id }}" {{ $catatan->proyek_fitur_id == $fitur->id ? 'selected' : '' }}>
                        {{ $fitur->nama_fitur }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Catatan --}}
        <div>
            <label class="block font-semibold">Catatan</label>
            <textarea name="catatan" class="w-full border p-2 rounded" required>{{ $catatan->catatan }}</textarea>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('proyek_catatan_pekerjaan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
        </div>
    </form>
</div>
@endsection
