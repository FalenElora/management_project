<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek Fitur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Proyek Fitur</h2>

    {{-- tombol tambah --}}
    <a href="{{ route('proyek_fitur.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">
       + Tambah Fitur
    </a>

    {{-- table daftar fitur --}}
    <table class="w-full border border-gray-300 bg-white shadow-md rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nama Fitur</th>
                <th class="p-2 border">Keterangan</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($proyekFitur as $fitur)
            <tr class="hover:bg-gray-100">
                <td class="p-2 border">{{ $fitur->id }}</td>
                <td class="p-2 border">{{ $fitur->nama_fitur }}</td>
                <td class="p-2 border">{{ $fitur->keterangan }}</td>
                <td class="p-2 border">{{ $fitur->status_fitur }}</td>
                <td class="p-2 border space-x-2">
                    <a href="{{ route('proyek_fitur.show', $fitur->id) }}" 
                       class="bg-blue-500 text-white px-2 py-1 rounded text-sm">Detail</a>

                    <a href="{{ route('proyek_fitur.edit', $fitur->id) }}" 
                       class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Edit</a>

                    <form action="{{ route('proyek_fitur.destroy', $fitur->id) }}" 
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-600 text-white px-2 py-1 rounded text-sm" 
                                onclick="return confirm('Hapus fitur ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center p-4 text-gray-500">
                    Belum ada fitur
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
