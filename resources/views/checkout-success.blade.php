<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .modal-success {
        --bs-modal-width: 720px;
      }
      .price { font-weight: 700; }
    </style>
  </head>
  <body>
    <div class="container">
      <!-- Button trigger modal (hidden) -->
      <button id="showSuccessModal" type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#successModal">
        Launch modal
      </button>

      <!-- Success Modal -->
      <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-success">
          <div class="modal-content">
              <div class="modal-header bg-success text-white">
              <h5 class="modal-title" id="successModalLabel">Pesanan Berhasil</h5>
              <button id="successModalCloseBtn" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <p><strong>Transaction ID:</strong> {{ $transaksi->id_transaksi }}</p>
                  <p><strong>Nomor Meja:</strong> {{ $transaksi->no_meja }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                  <p class="mb-0"><strong>Total Pembayaran:</strong></p>
                  <p class="price">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</p>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Produk</th>
                      <th class="text-end">Qty</th>
                      <th class="text-end">Harga</th>
                      <th class="text-end">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i = 1; @endphp
                    @foreach($transaksi->detail as $d)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $d->produk->nama ?? $d->produk->name ?? ('Produk #' . $d->id_produk) }}</td>
                        <td class="text-end">{{ $d->qty ?? $d->jumlah }}</td>
                        <td class="text-end">Rp {{ number_format($d->harga ?? $d->getHargaAttribute(), 0, ',', '.') }}</td>
                        <td class="text-end">Rp {{ number_format($d->subtotal, 0, ',', '.') }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="text-end mt-3">
                <small class="text-muted">Terima kasih telah memesan di Twins Coffee.</small>
              </div>
            </div>
            <div class="modal-footer">
              <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali ke Menu</a>
              <button type="button" class="btn btn-primary" onclick="window.print()">Cetak Struk</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function(){
        // auto show modal when page loads
        var btn = document.getElementById('showSuccessModal');
        if(btn) { btn.click(); }

        // when user clicks the X (close) button, redirect to cart (cart should be empty already)
        var closeBtn = document.getElementById('successModalCloseBtn');
        if (closeBtn) {
          closeBtn.addEventListener('click', function(e){
            // small timeout to allow modal to finish closing
            setTimeout(function(){ window.location.href = '{{ url('/cart') }}'; }, 100);
          });
        }
      });
    </script>
  </body>
</html>
