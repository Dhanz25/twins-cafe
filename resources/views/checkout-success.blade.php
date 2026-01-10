<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pembayaran Berhasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="alert alert-success">Pembayaran berhasil. Terima kasih atas pesanan Anda.</div>
    <a href="{{ route('menu.index') }}" class="btn btn-primary">Kembali ke Menu</a>
  </div>
</body>
</html>
