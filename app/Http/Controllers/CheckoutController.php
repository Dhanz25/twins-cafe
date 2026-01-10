<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('menu.index');
        }

        $total = collect($cart)->sum(function($item){
            return isset($item['subtotal']) ? intval($item['subtotal']) : (intval($item['harga'] ?? $item['price'] ?? 0) * intval($item['qty'] ?? 1));
        });

        $tableNumber = session()->get('table_number');

        return view('checkout', ['cart' => $cart, 'total' => $total, 'table_number' => $tableNumber]);
    }

    /**
     * Store table number and prepare checkout data, then redirect to checkout page
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_meja' => 'required|integer|min:1',
        ]);

        $noMeja = intval($validated['no_meja']);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('menu.index');
        }

        $total = collect($cart)->sum(function($item){
            $harga = intval($item['harga'] ?? $item['price'] ?? 0);
            $qty = intval($item['qty'] ?? $item['quantity'] ?? 1);
            return $harga * $qty;
        });

        // perform DB transaction: create transaksi and detail_transaksi rows atomically
        try {
            $transaksi = DB::transaction(function() use ($noMeja, $cart, $total) {
                $trans = Transaksi::create([
                    'tanggal' => now()->toDateString(),
                    'id_pelanggan' => null,
                    'no_meja' => $noMeja,
                    'total' => $total,
                ]);

                // insert detail_transaksi for each cart item
                foreach ($cart as $pid => $item) {
                    $id_produk = isset($item['id']) ? $item['id'] : $pid;
                    $jumlah = intval($item['qty'] ?? $item['quantity'] ?? 1);
                    $subtotal = isset($item['subtotal']) ? intval($item['subtotal']) : (intval($item['harga'] ?? 0) * $jumlah);

                    DetailTransaksi::create([
                        'id_transaksi' => $trans->id_transaksi,
                        'id_produk' => $id_produk,
                        'jumlah' => $jumlah,
                        'subtotal' => $subtotal,
                    ]);
                }

                return $trans;
            });
        } catch (\Throwable $e) {
            // rollback handled by DB::transaction; return back with error
            return redirect()->back()->withErrors(['checkout' => 'Gagal menyimpan pesanan. Silakan coba lagi.']);
        }

        // clear cart session only after successful DB transaction
        session()->forget('cart');

        // Redirect back with success message
        return redirect()->back()->with('success', 'Pesanan berhasil. ID: ' . $transaksi->id_transaksi);
    }

    /**
     * Finalize the order (placeholder), clear cart and redirect to success
     */
    public function confirm(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('menu.index');
        }

        $tableNumber = session()->get('table_number');
        if (!$tableNumber) {
            return redirect()->route('checkout.index')->withErrors(['table_number' => 'Nomor meja belum diisi.']);
        }

        $total = session()->get('total_price', 0);

        // Placeholder: here you would create Order record in DB

        // Clear cart after confirming order
        session()->forget('cart');

        // keep table_number and total for success view if needed
        session()->flash('order_table_number', $tableNumber);
        session()->flash('order_total', $total);

        return redirect()->route('checkout.success');
    }

    public function pay(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json(['error' => 'Cart is empty'], 400);
        }

        $orderId = 'ORDER-' . time() . '-' . Str::random(5);

        $item_details = [];
        $gross_amount = 0;
        foreach ($cart as $pid => $item) {
            $price = intval($item['harga'] ?? $item['price'] ?? 0);
            $qty = intval($item['qty'] ?? 1);
            $subtotal = isset($item['subtotal']) ? intval($item['subtotal']) : ($price * $qty);
            $item_details[] = [
                'id' => $item['id'] ?? $pid,
                'price' => $price,
                'quantity' => $qty,
                'name' => $item['nama'] ?? $item['name'] ?? 'Produk',
            ];
            $gross_amount += $subtotal;
        }

        // Midtrans config
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = filter_var(config('services.midtrans.is_production'), FILTER_VALIDATE_BOOLEAN);
        Config::$clientKey = config('services.midtrans.client_key');

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $gross_amount,
            ],
            'item_details' => $item_details,
        ];

        $snapToken = Snap::getSnapToken($params);

        // store order id temporarily in session for later reference
        session()->put('checkout_order_id', $orderId);

        return response()->json(['token' => $snapToken, 'order_id' => $orderId]);
    }

    public function callback(Request $request)
    {
        // Midtrans notification handling
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = filter_var(config('services.midtrans.is_production'), FILTER_VALIDATE_BOOLEAN);

        // Use Notification helper from SDK
        try {
            $notification = new Notification();
            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id ?? null;

            if ($transactionStatus === 'settlement' || $transactionStatus === 'capture') {
                // successful payment -> clear cart
                session()->forget('cart');
                // optionally record order in DB here
            }

            return response('OK');
        } catch (\Exception $e) {
            return response('ERR', 500);
        }
    }

    public function success()
    {
        $lastId = session()->get('last_transaction_id');
        if (!$lastId) {
            return redirect()->route('menu.index');
        }

        $transaksi = Transaksi::find($lastId);
        if (!$transaksi) {
            return redirect()->route('menu.index');
        }

        return view('checkout.success', ['transaksi' => $transaksi]);
    }
}
