<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        $kategoris = Kategori::all();

        return view('layouts.home', compact('produks', 'kategoris'));
    }

    /**
     * Display admin product listing.
     */
    public function adminIndex()
    {
        // paginate products 12 per page for admin listing
        $produks = Produk::with('kategori')->orderBy('id_produk','desc')->paginate(12);
        $kategoris = Kategori::all();

        return view('layouts.admin.produk', compact('produks','kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_kategori' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        // handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', $file->getClientOriginalName());
            $dest = public_path('images');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $data['image'] = $filename;
        }

        Produk::create($data);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();

        return view('layouts.admin.produk_edit', compact('produk','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $p = Produk::findOrFail($id);

        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_kategori' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        // handle image upload (store in public/images so asset('images/...') works)
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', $file->getClientOriginalName());
            $dest = public_path('images');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            // delete old image if exists
            if ($p->image) {
                $oldPath = public_path('images/' . $p->image);
                if (file_exists($oldPath) && is_file($oldPath)) {
                    @unlink($oldPath);
                }
            }
            $file->move($dest, $filename);
            $data['image'] = $filename;
        }

        $p->update($data);

        $msg = 'Produk berhasil diupdate.';
        if (array_key_exists('image', $data)) {
            $msg = 'Produk berhasil diupdate dan gambar diganti.';
        }

        return redirect()->route('admin.produk')->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $p = Produk::findOrFail($id);

        // delete image file if exists in public/images
        if ($p->image) {
            $path = public_path('images/' . $p->image);
            if (file_exists($path) && is_file($path)) {
                @unlink($path);
            }
        }

        $p->delete();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus.');
    }
}
