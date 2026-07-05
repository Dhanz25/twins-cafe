<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display admin kategori listing.
     */
    public function index()
    {
        $kategoris = Kategori::withCount('produk')->orderBy('id_kategori', 'desc')->get();
        return view('layouts.admin.kategori', compact('kategoris'));
    }

    /**
     * Store a newly created kategori.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Update the specified kategori.
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori,' . $id . ',id_kategori',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil diupdate.');
    }

    /**
     * Remove the specified kategori.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        // Cek apakah kategori masih dipakai oleh produk
        if ($kategori->produk()->count() > 0) {
            return redirect()->route('admin.kategori')->with('error', 'Kategori tidak bisa dihapus karena masih dipakai oleh ' . $kategori->produk()->count() . ' produk.');
        }

        $kategori->delete();

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
