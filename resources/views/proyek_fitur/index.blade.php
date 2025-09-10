@extends('layouts.app')

@section('title', 'Daftar Proyek Fitur')

@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Proyek Fitur</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('proyek_fitur.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
            + Tambah Fitur
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nama Fitur</th>
                    <th class="px-4 py-2 border">Keterangan</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($proyekFitur as $fitur)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $fitur->id }}</td>
                    <td class="px-4 py-2 border">{{ $fitur->nama_fitur }}</td>
                    <td class="px-4 py-2 border">{{ $fitur->keterangan }}</td>
                    <td class="px-4 py-2 border">{{ $fitur->status_fitur }}</td>
                    <td class="px-4 py-2 border flex gap-2">
                        <a href="{{ route('proyek_fitur.show', $fitur->id) }}" 
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                           Detail
                        </a>
                        <a href="{{ route('proyek_fitur.edit', $fitur->id) }}" 
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                           Edit
                        </a>
                        <form action="{{ route('proyek_fitur.destroy', $fitur->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Hapus fitur ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">Belum ada fitur</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
