<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Proyek Fitur User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-6 bg-gray-100">
  <h1 class="text-2xl font-bold mb-4">Daftar Proyek Fitur User</h1>

  <a href="{{ route('proyek_fitur_user.create') }}" class="btn btn-primary mb-3">+ Tambah User Fitur</a>

  <table class="table table-bordered bg-white shadow-md">
    <thead>
      <tr>
        <th>ID</th>
        <th>Proyek Fitur</th>
        <th>User</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($proyekFiturUser as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->proyekFitur->nama_fitur ?? '-' }}</td>
          <td>{{ $item->user->name ?? '-' }}</td>
          <td>{{ $item->keterangan }}</td>
          <td>
            <a href="{{ route('proyek_fitur_user.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('proyek_fitur_user.destroy', $item->id) }}" method="POST" class="inline-block">
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
