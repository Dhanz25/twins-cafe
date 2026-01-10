<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>.container { max-width:900px; margin-top:40px; }</style>
</head>
<body>
  <div class="container">
    <h3>Checkout</h3>
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Ringkasan Pesanan</h5>
        <ul class="list-group mb-3">
          @foreach($cart as $pid => $item)
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold">{{ $item['nama'] ?? 'Produk' }}</div>
              <small>Rp {{ number_format($item['harga'] ?? 0,0,',','.') }} x {{ $item['qty'] ?? 1 }}</small>
            </div>
            <div>Rp {{ number_format($item['subtotal'] ?? (($item['harga'] ?? 0) * ($item['qty'] ?? 1)),0,',','.') }}</div>
          </li>
          @endforeach
        </ul>

        <div class="d-flex justify-content-between align-items-center mb-3">
          <div>
            <strong>Nomor Meja:</strong>
            <div>{{ $table_number ?? '-' }}</div>
          </div>
          <div>
            <h5>Total</h5>
            <h4 id="gross-amount">Rp {{ number_format($total,0,',','.') }}</h4>
          </div>
        </div>

        <form method="POST" action="{{ route('checkout.store') }}">
          @csrf
          <div class="mb-3">
            <label for="no_meja" class="form-label">Nomor Meja</label>
            <input id="no_meja" name="no_meja" type="number" min="1" class="form-control" required value="{{ old('no_meja', session('table_number', '')) }}">
          </div>
          <button type="submit" class="btn btn-success">Checkout dan Bayar</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
