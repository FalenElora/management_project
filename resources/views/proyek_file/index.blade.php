<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Proyek File</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    @extends('layouts.app')
    <div class="max-w-6xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-700 flex items-center gap-2">
                📂 Daftar Proyek File
            </h1>
            <a href="{{ route('proyek_file.create') }}" 
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
               + Tambah File
            </a>
        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-teal-600 text-white">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nama File</th>
                        <th class="px-4 py-3">Keterangan</th>
                        <th class="px-4 py-3">Path</th>
                        <th class="px-4 py-3">User</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($files as $file)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $file->id }}</td>
                            <td class="px-4 py-3">{{ $file->nama_file }}</td>
                            <td class="px-4 py-3">{{ $file->keterangan }}</td>
                            <td class="px-4 py-3">{{ $file->path }}</td>
                            <td class="px-4 py-3">{{ $file->user->name ?? '-' }}</td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="{{ route('proyek_file.edit', $file->id) }}" 
                                   class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                   Edit
                                </a>
                                <form action="{{ route('proyek_file.destroy', $file->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">
                                Belum ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
