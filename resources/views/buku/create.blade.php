<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">Tambah Buku Baru</h1>
      <a href="{{ route('buku.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Kembali</a>
    </div>

    <!-- Form Buku -->
    <div>
      <h2 class="text-xl font-semibold mb-2">Form Buku</h2>
      <form method="POST" action="{{ route('buku.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
          <input type="text" name="judul" placeholder="Judul Buku" class="border px-3 py-2 rounded" required>
          <input type="text" name="penulis" placeholder="Pengarang" class="border px-3 py-2 rounded" required>
          <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" class="border px-3 py-2 rounded" required>
          <input type="text" name="penerbit" placeholder="Penerbit" class="border px-3 py-2 rounded" required>
          <input type="text" name="kategori" placeholder="Kategori" class="border px-3 py-2 rounded md:col-span-2" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
      </form>
    </div>
  </div>
</body>
</html>
