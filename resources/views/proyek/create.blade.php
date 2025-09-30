@extends('layouts.app')

@section('title', 'Tambah Proyek')

@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Tambah Proyek</h2>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('proyek.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Nama Proyek</label>
                <input type="text" name="nama_proyek" value="{{ old('nama_proyek') }}" class="w-full border rounded p-2">
                @error('nama_proyek') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Customer</label>
                <select name="customer_id" class="w-full border rounded p-2">
                    <option value="">-- Pilih Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->nama }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border rounded p-2">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="w-full border rounded p-2">
                @error('lokasi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

           <div class="grid grid-cols-2 gap-4 mb-4">
    <div>
            <label class="block font-semibold">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" class="w-full border rounded p-2">
            @error('tanggal_mulai')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-semibold">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" class="w-full border rounded p-2">
            @error('tanggal_selesai')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
    </div>


           <div class="mb-4">
                <label class="block font-semibold">Anggaran</label>
                <input type="number" name="anggaran" step="0.01"
                    value="{{ old('anggaran') }}"
                    class="w-full border rounded p-2">
                @error('anggaran')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label class="block font-semibold">Status</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="">-- Pilih Status --</option>
                    <option value="belum_dimulai">Belum Dimulai</option>
                    <option value="sedang_berjalan">Sedang Berjalan</option>
                    <option value="selesai">Selesai</option>
                    <option value="ditunda">Ditunda</option>
                </select>
                @error('status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                <a href="{{ route('proyek.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
