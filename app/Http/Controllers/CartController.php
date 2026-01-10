<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     session()->put('cart', [
    //     1 => [
    //         'id' => 1,
    //         'name' => 'Produk Test',
    //         'price' => 10000,
    //         'qty' => 2
    //     ]
    // ]);

    // Normalize any legacy cart data to the standard structure before rendering
    $cart = session()->get('cart', []);
    $normalized = [];
    foreach ($cart as $pid => $item) {
        // handle legacy keys: name/price -> nama/harga
        $nama = $item['nama'] ?? $item['name'] ?? '';
        $harga = isset($item['harga']) ? intval($item['harga']) : (isset($item['price']) ? intval($item['price']) : 0);
        $qty = intval($item['qty'] ?? $item['quantity'] ?? 1);
        $image = $item['image'] ?? null;
        $subtotal = $item['subtotal'] ?? ($harga * $qty);

        $normalized[$pid] = [
            'id' => $item['id'] ?? $pid,
            'nama' => $nama,
            'harga' => $harga,
            'qty' => $qty,
            'image' => $image,
            'subtotal' => $subtotal,
        ];
    }
    // If any normalized items lack an image, attempt to fetch from DB in one query
    $missing = [];
    foreach ($normalized as $pid => $item) {
        if (empty($item['image'])) {
            $missing[] = $pid;
        }
    }

    if (!empty($missing)) {
        $products = Produk::whereIn('id_produk', $missing)->get()->keyBy('id_produk');
        foreach ($missing as $mid) {
            if (isset($products[$mid]) && $products[$mid]->image) {
                $normalized[$mid]['image'] = asset('images/' . $products[$mid]->image);
            } else {
                $normalized[$mid]['image'] = null;
            }
        }
    }

    // replace session cart with normalized structure to avoid mixed keys
    session()->put('cart', $normalized);

    return view('layouts.cart');
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function add(Request $request)
    {
    // ✅ VALIDASI TEGAS
    $validated = $request->validate([
        'product_id' => 'required|integer|exists:produk,id_produk',
        'quantity'   => 'required|integer|min:1',
    ]);

    $product = Produk::findOrFail($validated['product_id']);
    $qty = $validated['quantity'];

    $cart = session()->get('cart', []);

    // use the model primary key (id_produk)
    $pid = $product->getKey();

    if (isset($cart[$pid])) {
        $cart[$pid]['qty'] = intval($cart[$pid]['qty']) + $qty;
    } else {
        $cart[$pid] = [
            'id'       => $pid,
            'nama'     => $product->nama_produk,
            'harga'    => (int) $product->harga,
            'qty'      => $qty,
            'image'    => $product->image ? asset('images/' . $product->image) : null,
            'subtotal' => 0,
        ];
    }

    // recalc subtotal
    $cart[$pid]['subtotal'] = $cart[$pid]['harga'] * $cart[$pid]['qty'];

    session()->put('cart', $cart);

    return response()->json([
        'success' => true,
        'count'   => collect($cart)->sum('qty'),
        'cart'    => $cart,
    ]);
}

    /**
     * Clear the cart from session.
     */
    public function clear(Request $request)
    {
        session()->forget('cart');
        // optional flash
        session()->flash('success', 'Keranjang berhasil dikosongkan.');
        return redirect()->route('cart.index');
    }
}
