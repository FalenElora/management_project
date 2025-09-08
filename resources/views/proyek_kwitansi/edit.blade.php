@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Edit Kwitansi</h2>

        <form action="{{ route('proyek_kwitansi.update', $data->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-600">Nomor Kwitansi</label>
                <input type="text" name="nomor_kwitansi"
                       value="{{ old('nomor_kwitansi', $data->nomor_kwitansi) }}"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Nomor Invoice</label>
                <input type="text" name="nomor_invoice"
                       value="{{ old('nomor_invoice', $data->nomor_invoice) }}"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Pilih Proyek</label>
                <select name="proyek_id"
                        class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500">
                    @foreach($proyek as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $data->proyek_id ? 'selected' : '' }}>
                            {{ $p->nama_proyek }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Judul Kwitansi</label>
                <input type="text" name="judul_kwitansi"
                       value="{{ old('judul_kwitansi', $data->judul_kwitansi) }}"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Jumlah</label>
                <input type="number" step="0.01" name="jumlah"
                       value="{{ old('jumlah', $data->jumlah) }}"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Tanggal Kwitansi</label>
                <input type="date" name="tanggal_kwitansi"
                       value="{{ old('tanggal_kwitansi', $data->tanggal_kwitansi) }}"
                       class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Keterangan</label>
                <textarea name="keterangan"
                          class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-teal-500">{{ old('keterangan', $data->keterangan) }}</textarea>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('proyek_kwitansi.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit"
                        class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded">
                        Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
