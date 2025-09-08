@extends('layouts.app')

@section('title', 'Daftar Proyek')

@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Proyek</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('proyek.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
            + Tambah Proyek
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Nama Proyek</th>
                    <th class="px-4 py-2 border">Customer</th>
                    <th class="px-4 py-2 border">Lokasi</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                     <th class="px-4 py-2 border">Deskripsi</th>
                     <th class="px-4 py-2 border">Anggaran</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyek as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $item->nama_proyek }}</td>
                    <td class="px-4 py-2 border">{{ $item->customer->nama ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $item->lokasi }}</td>
                    <td class="px-4 py-2 border">
                        {{ $item->tanggal_mulai }} - {{ $item->tanggal_selesai ?? '-' }}
                    </td>
                     <td class="px-4 py-2 border">{{ $item->deskripsi }}</td>
                    <td class="px-4 py-2 border">
                        Rp {{ number_format($item->anggaran, 0, ',', '.') }}
                    </td>

                    <td class="px-4 py-2 border">
                        <span class="px-2 py-1 rounded text-white
                            @if($item->status == 'belum_dimulai') bg-gray-500
                            @elseif($item->status == 'sedang_berjalan') bg-blue-600
                            @elseif($item->status == 'selesai') bg-green-600
                            @else bg-yellow-500 @endif">
                            {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border flex gap-2">
                        <a href="{{ route('proyek.edit', $item->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('proyek.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus proyek ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($proyek->isEmpty())
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data proyek</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
