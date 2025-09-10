@extends('layouts.app')

@section('title', 'Proyek Fitur User')

@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Proyek Fitur User</h2>

    <a href="{{ route('proyek_fitur_user.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">
        + Tambah User Fitur
    </a>

    <table class="w-full border border-gray-200 rounded shadow-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Proyek Fitur</th>
                <th class="px-4 py-2 border">User</th>
                <th class="px-4 py-2 border">Keterangan</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($proyekFiturUser as $item)
                <tr class="text-center">
                    <td class="px-4 py-2 border">{{ $item->id }}</td>
                    <td class="px-4 py-2 border">{{ $item->proyekFitur->nama_fitur ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $item->user->name ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $item->keterangan }}</td>
                    <td class="px-4 py-2 border flex justify-center gap-2">
                        <a href="{{ route('proyek_fitur_user.edit', $item->id) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                            Edit
                        </a>
                        <form action="{{ route('proyek_fitur_user.destroy', $item->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                        Belum ada data User Fitur
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
