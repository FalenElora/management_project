@extends('layouts.app')

@section('title', 'Edit Invoice')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
    <h2 class="text-lg font-semibold mb-4 text-gray-700">Edit Invoice</h2>

    <form action="{{ route('proyek_invoice.update', $proyek_invoice->id) }}" method="POST">
        @csrf 
        @method('PUT')

        <div>
            <label class="block text-gray-700 mb-1">Nomor Invoice</label>
            <input type="text" name="nomor_invoice" value="{{ $proyek_invoice->nomor_invoice }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Judul Invoice</label>
            <input type="text" name="judul_invoice" value="{{ $proyek_invoice->judul_invoice }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Jumlah</label>
            <input type="number" name="jumlah" step="0.01" value="{{ $proyek_invoice->jumlah }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Tanggal Invoice</label>
            <input type="date" name="tanggal_invoice" value="{{ $proyek_invoice->tanggal_invoice }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Keterangan</label>
            <textarea name="keterangan" class="w-full border rounded px-3 py-2">{{ $proyek_invoice->keterangan }}</textarea>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2" required>
                <option value="belum_dibayar" {{ $proyek_invoice->status == 'belum_dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                <option value="diproses" {{ $proyek_invoice->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="dibayar" {{ $proyek_invoice->status == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
            </select>
        </div>

        <div class="flex space-x-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                Update
            </button>
            <a href="{{ route('proyek_invoice.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded shadow">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
