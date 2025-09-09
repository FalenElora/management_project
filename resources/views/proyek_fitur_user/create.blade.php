<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Proyek Fitur User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-6">
  <h1 class="text-xl font-bold mb-4">Tambah Proyek Fitur User</h1>

  <form action="{{ route('proyek_fitur_user.store') }}" method="POST" class="space-y-3">
    @csrf
    <div>
      <label>Proyek Fitur</label>
      <input type="number" name="proyek_fitur_id" class="form-control" required>
    </div>
    <div>
      <label>User ID</label>
      <input type="number" name="user_id" class="form-control" required>
    </div>
    <div>
      <label>Keterangan</label>
      <textarea name="keterangan" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('proyek_fitur_user.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
