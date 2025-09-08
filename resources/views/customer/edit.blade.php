@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<div class="max-w-2xl mx-auto mt-6 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Customer</h2>

    <form method="POST" action="{{ route('customer.update', $customer->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $customer->nama) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $customer->alamat) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $customer->nomor_telepon) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium">Catatan</label>
            <textarea name="catatan" class="w-full border rounded px-3 py-2">{{ old('catatan', $customer->catatan) }}</textarea>
        </div>

        <div>
            <label class="block font-medium">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="aktif" {{ $customer->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak_aktif" {{ $customer->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('customer.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
        </div>
    </form>
</div>
@endsection
