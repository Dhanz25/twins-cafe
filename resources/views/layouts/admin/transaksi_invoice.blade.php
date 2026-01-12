@extends('layouts.admin.base')

@section('content')
<div class="invoice p-3">
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fa fa-glass"></i> Twins Coffee
                <small class="float-right">Date: {{ date('d-m-Y H:i') }}</small>
            </h4>
        </div>
    </div>

    <div class="row invoice-info mt-3">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>Twins Coffee</strong><br>
                Jl. Contoh No.1<br>
                Kota Contoh<br>
                Phone: (000) 123-4567<br>
                Email: info@twinscoffee.local
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong>Customer</strong><br>
                Session: {{ $transaksi->session_id }}<br>
                Meja: {{ $transaksi->no_meja }}<br>
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            <b>Invoice #{{ $transaksi->id_transaksi }}</b><br>
            <br>
            <b>Status:</b> {{ $transaksi->status }}<br>
            <b>Total:</b> Rp {{ number_format($transaksi->total,0,',','.') }}
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi->detail as $d)
                    <tr>
                        <td>{{ $d->qty }}</td>
                        <td>{{ optional($d->produk)->nama_produk ?? ('Produk ID: '.$d->id_produk) }}</td>
                        <td>Rp {{ number_format($d->harga,0,',','.') }}</td>
                        <td>Rp {{ number_format($d->subtotal,0,',','.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-6">
            <p class="lead">Notes:</p>
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Terima kasih telah memesan di Twins Coffee. Selamat menikmati.
            </p>
        </div>
        <div class="col-6">
            <p class="lead">Amount Due</p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp {{ number_format($transaksi->total,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <th>Tax (0%)</th>
                        <td>Rp 0</td>
                    </tr>
                    <tr>
                        <th>Shipping:</th>
                        <td>Rp 0</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td><b>Rp {{ number_format($transaksi->total,0,',','.') }}</b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
