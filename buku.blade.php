@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manajemen Buku</h1>

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('buku.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul buku..." value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('buku.index') }}" method="GET">
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($kategories as $kategori)
                        <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h2>Form Buku</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="col-md-6">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                    </div>
                    <div class="col-md-6">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Daftar Buku</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>JUDUL</th>
                            <th>PENGARANG</th>
                            <th>TAHUN</th>
                            <th>PENERBIT</th>
                            <th>KATEGORI</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bukus as $buku)
                        <tr>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->pengarang }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->kategori }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                Menampilkan {{ $bukus->firstItem() }} - {{ $bukus->lastItem() }} dari {{ $bukus->total() }} buku
                <div class="float-end">
                    {{ $bukus->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection