<!-- TODO: tuliskan tampilan view web buku anda disini -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manajemen Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">Manajemen Buku</h1>
      <!-- <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Buku</button> -->
      <a href="{{ route('buku.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Buku</a>
    </div>

    <!-- Filter -->
    <div class="flex gap-4 mb-6">
      <input type="text" placeholder="Cari judul buku..." class="w-full border px-3 py-2 rounded">
      <select class="border px-3 py-2 rounded">
        <option>Semua Kategori</option>
        <option>Novel</option>
        <option>Ensiklopedia</option>
        <option>Biografi</option>
        <!-- Tambahkan kategori lain sesuai kebutuhan -->
      </select>
    </div>

    <!-- Form Buku -->
    <div class="mb-6">
      <h2 class="text-xl font-semibold mb-2">Form Buku</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <input type="text" placeholder="Judul Buku" class="border px-3 py-2 rounded">
        <input type="text" placeholder="Pengarang" class="border px-3 py-2 rounded">
        <input type="text" placeholder="Tahun Terbit" class="border px-3 py-2 rounded">
        <input type="text" placeholder="Penerbit" class="border px-3 py-2 rounded">
        <input type="text" placeholder="Kategori" class="border px-3 py-2 rounded md:col-span-2">
      </div>
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
    </div>

    <!-- Tabel Daftar Buku -->
    <div>
      <h2 class="text-xl font-semibold mb-2">Daftar Buku</h2>
      <div class="overflow-x-auto">
        <table class="w-full text-left border">
          <thead class="bg-gray-200">
            <tr>
              <th class="p-2">JUDUL</th>
              <th class="p-2">PENGARANG</th>
              <th class="p-2">TAHUN</th>
              <th class="p-2">PENERBIT</th>
              <th class="p-2">KATEGORI</th>
              <th class="p-2">AKSI</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($bukus as $buku)
            <tr class="border-t">
              <td class="p-2">{{ $buku->judul }}</td>
              <td class="p-2">{{ $buku->penulis }}</td>
              <td class="p-2">{{ $buku->tahun_terbit }}</td>
              <td class="p-2">{{ $buku->penerbit }}</td>
              <td class="p-2">{{ $buku->kategori }}</td>
              <td class="p-2 space-x-2">
                <a href="/" class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Edit</a>
                <form action="/" method="POST" style="display:inline;">
                  <button type="submit" class="bg-red-600 px-3 py-1 rounded text-white hover:bg-red-700">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
      <span>Menampilkan 1 - 10 dari 100 buku</span>
      <div class="flex gap-1">
        <button class="px-2 py-1 border rounded">&laquo;</button>
        <button class="px-3 py-1 border rounded bg-blue-600 text-white">1</button>
        <button class="px-3 py-1 border rounded">2</button>
        <button class="px-3 py-1 border rounded">3</button>
        <span class="px-2 py-1">...</span>
        <button class="px-3 py-1 border rounded">10</button>
        <button class="px-2 py-1 border rounded">&raquo;</button>
      </div>
    </div>
  </div>
</body>
</html>

