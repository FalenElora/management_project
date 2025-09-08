@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Daftar Kwitansi</h2>
            <a href="{{ route('proyek_kwitansi.create') }}"
               class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded shadow">
               + Tambah Kwitansi
            </a>
        </div>

        <table class="w-full border border-gray-200 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-3 border">No</th>
                    <th class="py-2 px-3 border">Nomor Kwitansi</th>
                    <th class="py-2 px-3 border">Nomor Invoice</th>
                    <th class="py-2 px-3 border">Judul</th>
                    <th class="py-2 px-3 border">Jumlah</th>
                    <th class="py-2 px-3 border">Tanggal</th>
                    <th class="py-2 px-3 border">Keterangan</th>
                    <th class="py-2 px-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $kwitansi)
                    <tr class="text-center">
                        <td class="py-2 px-3 border">{{ $loop->iteration }}</td>
                        <td class="py-2 px-3 border">{{ $kwitansi->nomor_kwitansi }}</td>
                        <td class="py-2 px-3 border">{{ $kwitansi->nomor_invoice }}</td>
                        <td class="py-2 px-3 border">{{ $kwitansi->judul_kwitansi }}</td>
                        <td class="py-2 px-3 border">{{ number_format($kwitansi->jumlah, 2) }}</td>
                        <td class="py-2 px-3 border">{{ $kwitansi->tanggal_kwitansi }}</td>
                        <td class="py-2 px-3 border">{{ $kwitansi->keterangan }}</td>
                        <td class="py-2 px-3 border flex justify-center gap-2">
                            <a href="{{ route('proyek_kwitansi.edit', $kwitansi->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                Edit
                            </a>
                            <form action="{{ route('proyek_kwitansi.destroy', $kwitansi->id) }}"
                                  method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-gray-500">
                            Belum ada kwitansi
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
