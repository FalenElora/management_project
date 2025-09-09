<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek Fitur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded">
    <h2 class="text-xl font-bold mb-4">Edit Proyek Fitur</h2>

    <form action="{{ route('proyek_fitur.update', $proyekFitur->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nama Fitur</label>
            <input type="text" name="nama_fitur" class="w-full border p-2 rounded" value="{{ $proyekFitur->nama_fitur }}" required>
        </div>

        <div>
            <label class="block font-semibold">Keterangan</label>
            <textarea name="keterangan" class="w-full border p-2 rounded">{{ $proyekFitur->keterangan }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Status</label>
            <select name="status_fitur" class="w-full border p-2 rounded">
                <option value="pending" {{ $proyekFitur->status_fitur == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="progress" {{ $proyekFitur->status_fitur == 'progress' ? 'selected' : '' }}>Progress</option>
                <option value="done" {{ $proyekFitur->status_fitur == 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>

        <input type="hidden" name="proyek_id" value="{{ $proyekFitur->proyek_id }}">

        <div class="flex space-x-2">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('proyek_fitur.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
</body>
</html>
