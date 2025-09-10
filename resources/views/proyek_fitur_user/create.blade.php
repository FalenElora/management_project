@extends('layouts.app')

@section('title', 'Tambah Proyek Fitur User')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded p-6 mt-6">
    <h2 class="text-xl font-bold mb-4">Tambah Proyek Fitur User</h2>

    <form action="{{ route('proyek_fitur_user.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Pilih Proyek Fitur --}}
        <div>
            <label class="block font-semibold">Proyek Fitur</label>
            <select name="proyek_fitur_id" class="w-full border p-2 rounded" required>
                @foreach($proyekFitur as $fitur)
                    <option value="{{ $fitur->id }}">{{ $fitur->nama_fitur }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pilih User --}}
        <div>
            <label class="block font-semibold">User</label>
            <select name="user_id" class="w-full border p-2 rounded" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Keterangan --}}
        <div>
            <label class="block font-semibold">Keterangan</label>
            <textarea name="keterangan" class="w-full border p-2 rounded"></textarea>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('proyek_fitur_user.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
        </div>
    </form>
</div>
@endsection
