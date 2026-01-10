<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesanan Berhasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>.container{max-width:800px;margin-top:40px}</style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Pesanan Berhasil</h3>
        <p class="mb-1"><strong>Transaction ID:</strong> {{ $transaksi->id_transaksi }}</p>
        <p class="mb-1"><strong>Nomor Meja:</strong> {{ $transaksi->no_meja }}</p>
        <p class="mb-3"><strong>Total Pembayaran:</strong> Rp {{ number_format($transaksi->total,0,',','.') }}</p>

        <a href="{{ route('menu.index') }}" class="btn btn-primary">Kembali ke Menu</a>
      </div>
    </div>
  </div>
</body>
</html>
