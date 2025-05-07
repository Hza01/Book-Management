<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

// TODO: tuliskan code untuk controller buku anda disini
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('buku', compact('bukus')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'penerbit' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
        ]);

        // Menyimpan buku baru ke database
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'penerbit' => $request->penerbit,
            'kategori' => $request->kategori,
        ]);

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        // Menampilkan form untuk mengedit data buku
        return view('buku.edit', compact('buku')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        // Validasi input dari user
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'penerbit' => 'required|string|max:255', 
            'kategori' => 'required|string|max:255', 
        ]);

        // Update data buku yang ada
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'penerbit' => $request->penerbit, 
            'kategori' => $request->kategori, 
        ]);

        return redirect()->route('buku.show', $buku)->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku')->with('success', 'Buku berhasil dihapus.');
    }
}
