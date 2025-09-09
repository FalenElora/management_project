<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Catatan Pekerjaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-6">
  <h1 class="text-xl font-bold mb-4">Edit Catatan Pekerjaan</h1>

  <form action="{{ route('proyek_catatan_pekerjaan.update', $catatan->id) }}" method="POST" class="space-y-3">
    @csrf @method('PUT')
    <div>
      <label>Proyek Fitur</label>
      <input type="number" name="proyek_fitur_id" class="form-control" value="{{ $catatan->proyek_fitur_id }}" required>
    </div>
    <div>
      <label>Catatan</label>
      <textarea name="catatan" class="form-control" required>{{ $catatan->catatan }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('proyek_catatan_pekerjaan.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
