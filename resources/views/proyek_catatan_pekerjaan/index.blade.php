<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Catatan Pekerjaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-6 bg-gray-100">
  <h1 class="text-2xl font-bold mb-4">Daftar Catatan Pekerjaan</h1>

  <a href="{{ route('proyek_catatan_pekerjaan.create') }}" class="btn btn-primary mb-3">+ Tambah Catatan</a>

  <table class="table table-bordered bg-white shadow-md">
    <thead>
      <tr>
        <th>ID</th>
        <th>Proyek Fitur</th>
        <th>Catatan</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($catatan as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->proyekFitur->nama_fitur ?? '-' }}</td>
          <td>{{ $item->catatan }}</td>
          <td>{{ $item->created_at }}</td>
          <td>
            <a href="{{ route('proyek_catatan_pekerjaan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('proyek_catatan_pekerjaan.destroy', $item->id) }}" method="POST" class="inline-block">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
