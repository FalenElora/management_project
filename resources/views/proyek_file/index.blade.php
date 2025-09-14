@extends('layouts.app')

@section('title', 'Manajemen File Proyek')

@section('content')
<div class="max-w-6xl mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Manajemen File Proyek</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('proyek_file.create') }}" 
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah File
    </a>

    <div class="mt-4 bg-white shadow rounded overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nama File</th>
                    <th class="px-4 py-2 border">Keterangan</th>
                    <th class="px-4 py-2 border">Path</th>
                    <th class="px-4 py-2 border">Proyek</th>
                    <th class="px-4 py-2 border">User</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($files as $f)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $f->id }}</td>
                        <td class="px-4 py-2 border">{{ $f->nama_file }}</td>
                        <td class="px-4 py-2 border">{{ $f->keterangan ?? '-' }}</td>
                        <td class="px-4 py-2 border">
                            @if($f->path)
                                <a href="{{ asset('storage/'.$f->path) }}" target="_blank" class="text-blue-600 underline">
                                    Lihat File
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ $f->proyek->nama_proyek ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $f->user->name ?? '-' }}</td>
                        <td class="px-4 py-2 border space-x-2">
                            <a href="{{ route('proyek_file.edit', $f->id) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">Edit</a>
                            <form action="{{ route('proyek_file.destroy', $f->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    onclick="return confirm('Yakin hapus file ini?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Belum ada file proyek</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
