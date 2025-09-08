@extends('layouts.app')

@section('title', 'Tambah Invoice')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
    <h2 class="text-lg font-semibold mb-4 text-gray-700">Tambah Invoice</h2>

    <form action="{{ route('proyek_invoice.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-gray-700 mb-1">Nomor Invoice</label>
            <input type="text" name="nomor_invoice" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Pilih Proyek</label>
            <select name="proyek_id" class="w-full border rounded px-3 py-2" required>
                @foreach($proyeks as $proyek)
                    <option value="{{ $proyek->id }}">{{ $proyek->nama_proyek }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Judul Invoice</label>
            <input type="text" name="judul_invoice" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Jumlah</label>
            <input type="number" name="jumlah" step="0.01" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Tanggal Invoice</label>
            <input type="date" name="tanggal_invoice" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Keterangan</label>
            <textarea name="keterangan" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2" required>
                <option value="belum_dibayar">Belum Dibayar</option>
                <option value="diproses">Diproses</option>
                <option value="dibayar">Dibayar</option>
            </select>
        </div>

        <div class="flex space-x-3">
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded shadow">
                Simpan
            </button>
            <a href="{{ route('proyek_invoice.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded shadow">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
