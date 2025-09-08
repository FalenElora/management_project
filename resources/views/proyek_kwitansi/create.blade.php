@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Tambah Kwitansi</h2>

        <form action="{{ route('proyek_kwitansi.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-600">Nomor Kwitansi</label>
                <input type="text" name="nomor_kwitansi"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Nomor Invoice</label>
                <input type="text" name="nomor_invoice"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Pilih Proyek</label>
                <select name="proyek_id" class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500">
                    @foreach($proyek as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_proyek }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Judul Kwitansi</label>
                <input type="text" name="judul_kwitansi"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Jumlah</label>
                <input type="number" step="0.01" name="jumlah"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Tanggal Kwitansi</label>
                <input type="date" name="tanggal_kwitansi"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Keterangan</label>
                <textarea name="keterangan"
                          class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"></textarea>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('proyek_kwitansi.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit"
                        class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded">
                        Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
