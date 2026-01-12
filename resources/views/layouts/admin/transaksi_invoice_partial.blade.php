<div class="invoice p-3 mb-3">
  <!-- title row -->
  <div class="row">
    <div class="col-12">
      <h4>
        <i class="fas fa-globe"></i> Twins Coffe
        <small class="float-right">Date: {{ optional($transaksi->created_at)->format('d/m/Y') ?? now()->format('d/m/Y') }}</small>
      </h4>
    </div>
    <!-- /.col -->
  </div>

  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      From
      <address>
        <strong>Twins Coffe, Inc.</strong><br>
        Jalan Contoh No.1<br>
        Kota Contoh, 12345<br>
        Phone: (021) 000-0000<br>
        Email: info@twins.example
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      To
      <address>
        <strong>Customer</strong><br>
        Session ID: {{ $transaksi->session_id ?? '-' }}<br>
        No Meja: {{ $transaksi->no_meja ?? '-' }}<br>
        Status: {{ $transaksi->status ?? '-' }}<br>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Invoice #{{ $transaksi->id_transaksi }}</b><br>
      <br>
      <b>Order ID:</b> {{ $transaksi->session_id ?? $transaksi->id_transaksi }}<br>
    </div>
    <!-- /.col -->
  </div>

  <!-- Table row -->
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Jumlah</th>
          <th>Produk</th>
          <th>Serial #</th>
          <th>Description</th>
          <th>Harga</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transaksi->detail as $d)
        <tr>
          <td>{{ $d->qty ?? $d->jumlah }}</td>
          <td>{{ $d->produk->nama_produk ?? 'Produk #' . ($d->id_produk ?? '-') }}</td>
          <td>{{ $d->id_produk ?? '-' }}-{{ $d->id_detail ?? '' }}</td>
          <td>{{ $d->produk->nama_produk ?? '-' }}</td>
          <td>Rp {{ number_format($d->harga ?? 0,0,',','.') }}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-6">
      
      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        Terima kasih sudah berbelanja di Twins Coffe. Jika ada keluhan, hubungi kami lewat email atau telepon.
      </p>
    </div>
    <!-- /.col -->
    <div class="col-6">
      <p class="lead">Amount Due </p>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>Sub total:</th>
            <td><b>Rp {{ number_format($transaksi->total ?? 0,0,',','.') }}</b></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
</div>