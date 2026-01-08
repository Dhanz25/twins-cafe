<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    { $cart = session()->get('cart', []); $id = $request->id; if (isset($cart[$id])) { $cart[$id]['qty']++; } else { $cart[$id] = [ 'id' => $id, 'name' => $request->name, 'price' => $request->price, 'qty' => 1 ]; } session()->put('cart', $cart); return response()->json([ 'count' => collect($cart)->sum('qty') ]); } }
