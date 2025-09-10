@extends('layouts.app')

@section('title', 'Daftar Catatan Pekerjaan')

@section('content')
<div class="max-w-6xl mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Catatan Pekerjaan</h1>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol tambah --}}
    <a href="{{ route('proyek_catatan_pekerjaan.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow mb-4 inline-block">
       + Tambah Catatan
    </a>

    {{-- Tabel --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Proyek Fitur</th>
                    <th class="px-4 py-2 border">Catatan</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($catatan as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $item->id }}</td>
                    <td class="px-4 py-2 border">{{ $item->proyekFitur->nama_fitur ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $item->catatan }}</td>
                    <td class="px-4 py-2 border">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                    <td class="px-4 py-2 border flex gap-2">
                        <a href="{{ route('proyek_catatan_pekerjaan.edit', $item->id) }}" 
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('proyek_catatan_pekerjaan.destroy', $item->id) }}" method="POST" 
                              onsubmit="return confirm('Yakin hapus catatan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">
                        Belum ada catatan pekerjaan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
