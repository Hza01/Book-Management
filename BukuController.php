<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        $bukus = Buku::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', '%' . $search . '%');
        })
        ->when($kategori, function ($query) use ($kategori) {
            return $query->where('kategori', $kategori);
        })
        ->paginate(10);

        $kategories = Buku::select('kategori')->distinct()->pluck('kategori');

        return view('buku', compact('bukus', 'kategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|numeric',
            'penerbit' => 'required',
            'kategori' => 'required'
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}