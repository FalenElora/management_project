@extends('layouts.app')

@section('title', 'Tambah Customer')

@section('content')
<div class="max-w-2xl mx-auto mt-6 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Customer</h2>

    <form action="{{ route('customer.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2" >
             @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Alamat</label>
            <input type="text" name="alamat" class="w-full border rounded px-3 py-2" >
             @error('alamat') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="w-full border rounded px-3 py-2" >
             @error('nomor_telepon') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Catatan</label>
            <textarea name="catatan" class="w-full border rounded px-3 py-2">{{ old('catatan') }}</textarea>
            @error('catatan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Status --</option>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak_aktif" {{ old('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            @error('status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('customer.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
        </div>
    </form>
</div>
@endsection
