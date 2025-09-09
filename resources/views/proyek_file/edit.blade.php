<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Proyek File</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 flex items-center gap-2">
            ➕ Tambah Proyek File
        </h1>

        <form action="{{ route('proyek_file.store') }}" method="POST" 
              class="bg-white p-6 rounded-xl shadow space-y-5">
            @csrf
            <div>
                <label class="block font-medium text-gray-700">Nama File</label>
                <input type="text" name="nama_file" 
                       class="w-full border border-gray-300 rounded-lg p-2 
                              focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Keterangan</label>
                <textarea name="keterangan" rows="3" 
                          class="w-full border border-gray-300 rounded-lg p-2 
                                 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"></textarea>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Path</label>
                <input type="text" name="path" 
                       class="w-full border border-gray-300 rounded-lg p-2 
                              focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">User ID</label>
                <input type="number" name="user_id" 
                       class="w-full border border-gray-300 rounded-lg p-2 
                              focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Proyek ID</label>
                <input type="number" name="proyek_id" 
                       class="w-full border border-gray-300 rounded-lg p-2 
                              focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
            </div>

            <div class="flex gap-3">
                <button type="submit" 
                        class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                    Simpan
                </button>
                <a href="{{ route('proyek_file.index') }}" 
                   class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600">
                   Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>
