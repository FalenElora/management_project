@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-semibold text-gray-700">Daftar Proyek File</h1>
        <a href="{{ route('proyek_file.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Proyek File
        </a>
    </div>
@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-semibold text-gray-700">Daftar Proyek File</h1>
        <a href="{{ route('proyek_file.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Proyek File
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full table-auto">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Nama File</th>
                    <th class="px-4 py-3 text-left">Keterangan</th>
                    <th class="px-4 py-3 text-left">Path</th>
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($files as $file)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $file->id }}</td>
                        <td class="px-4 py-3">{{ $file->nama_file }}</td>
                        <td class="px-4 py-3">{{ $file->keterangan }}</td>
                        <td class="px-4 py-3">{{ $file->path }}</td>
                        <td class="px-4 py-3">{{ $file->user->name ?? '-' }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('proyek_file.edit', $file->id) }}"
                               class="text-sm bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('proyek_file.destroy', $file->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center px-4 py-6 text-gray-500">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full table-auto">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Nama File</th>
                    <th class="px-4 py-3 text-left">Keterangan</th>
                    <th class="px-4 py-3 text-left">Path</th>
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($files as $file)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $file->id }}</td>
                        <td class="px-4 py-3">{{ $file->nama_file }}</td>
                        <td class="px-4 py-3">{{ $file->keterangan }}</td>
                        <td class="px-4 py-3">{{ $file->path }}</td>
                        <td class="px-4 py-3">{{ $file->user->name ?? '-' }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('proyek_file.edit', $file->id) }}"
                               class="text-sm bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('proyek_file.destroy', $file->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center px-4 py-6 text-gray-500">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
