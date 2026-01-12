<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Twins Coffe | Produk</title>
  <link rel="icon" href="{{ asset('images/logoTwins_coffe.png') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('AdminLTE-master/dist/css/adminlte.min.css') }}">
  <style>
    /* Product card: image fills top 50% */
    .product-card {
      height: 300px;
      display: flex;
      flex-direction: column;
    }
    /* make image area a fixed box, center and crop image inside */
    .product-card .product-image {
      height: 220px; /* smaller visible image area */
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #fff;
      border-bottom: 1px solid rgba(0,0,0,0.05);
      padding: 6px;
    }
    .product-card .product-image img {
      max-height: 100%;
      max-width: 90%;
      object-fit: contain;
      display: block;
      margin: 0 auto;
      border-radius: 4px;
    }
    .product-card .card-body {
      flex: 1 1 auto;
    }
    .product-card .card-footer {
      background: transparent;
      border-top: 1px solid rgba(0,0,0,0.08);
      padding-top: 10px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
      <img src="{{ asset('images/Logo.jpeg') }}" alt="Twins Coffe" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Twins Coffe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route ('admin.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset ('AdminLTE-master/pages/charts/chartjs.html') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Penjualan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.produk') }}" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.transaksi') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Transaksi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset ('AdminLTE-master/pages/examples/invoice.html') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Invoice
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-3 align-items-center">
          <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
              <i class="fas fa-plus"></i> Tambah
            </button>
          </div>
          <div class="col text-right">
            @if(isset($produks) && $produks->lastPage() > 1)
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item {{ $produks->onFirstPage() ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $produks->previousPageUrl() ?: '#' }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                @for ($i = 1; $i <= $produks->lastPage(); $i++)
                <li class="page-item {{ $produks->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $produks->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item {{ !$produks->hasMorePages() ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $produks->nextPageUrl() ?: '#' }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
            @endif
          </div>
        </div>
        @if(session('success'))
        <div class="row">
          <div class="col-12">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{ session('success') }}
            </div>
          </div>
        </div>
        @endif
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->


            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->

        <!-- Produk cards -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  @forelse($produks as $p)
                  <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card product-card">
                      @php
                        $imgUrl = $p->image ? asset('images/' . $p->image) : 'https://via.placeholder.com/600x400?text=No+Image';
                      @endphp
                      <div class="product-image">
                        <img src="{{ $imgUrl }}" alt="{{ $p->nama_produk }}">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">{{ $p->nama_produk }}</h5>
                        <p class="card-text text-muted">
                          @if($p->kategori)
                            • {{ $p->kategori->nama_kategori }} •
                          @endif
                          Rp {{ number_format($p->harga,0,',','.') }} • Stok: {{ $p->stok }}
                        </p>
                      </div>
                      <div class="card-footer text-center">
                        <button type="button" class="btn btn-sm btn-warning btn-edit"
                          data-id="{{ $p->id_produk }}"
                          data-nama="{{ $p->nama_produk }}"
                          data-harga="{{ $p->harga }}"
                          data-stok="{{ $p->stok }}"
                          data-kategori="{{ $p->id_kategori }}"
                          data-image="{{ $p->image }}"
                        >Edit</button>
                        <form action="#" method="POST" class="d-inline form-delete" data-id="{{ $p->id_produk }}" data-name="{{ $p->nama_produk }}">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-sm btn-danger btn-delete-trigger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  @empty
                  <div class="col-12">
                    <div class="alert alert-info">Belum ada produk.</div>
                  </div>
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteConfirmLabel">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus produk <strong id="delete_product_name"></strong> ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <form id="deleteForm" method="POST" action="#">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <!-- Tambah Produk Modal -->
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="formTambah" method="POST" action="{{ route('admin.produk.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="tambahModalLabel">Tambah Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama_produk" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control" name="id_kategori">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris ?? [] as $kat)
                <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" class="form-control" name="harga" min="0" required>
            </div>
            <div class="form-group">
              <label>Stok</label>
              <input type="number" class="form-control" name="stok" min="0" required>
            </div>
            <div class="form-group">
                    <label for="exampleInputFile">Gambar Produk</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Edit Produk Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="formEdit" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" class="form-control" name="nama_produk" id="edit_nama" required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-5">
                  <label>Gambar Produk</label>
                  <div class="mb-2">
                    <img id="edit_preview" src="" alt="preview" style="width:100%;height:auto;max-height:220px;border:1px solid #eee;padding:4px;border-radius:4px;object-fit:cover;">
                  </div>
                </div>
                <div class="col-7 d-flex flex-column justify-content-center">
                  <label>Ganti Gambar</label>
                  <input type="file" class="form-control-file" name="image" id="edit_image">
                  <small class="form-text text-muted">Maks 2MB. Pilih file untuk mengganti gambar saat ini.</small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control" name="id_kategori" id="edit_kategori">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris ?? [] as $kat)
                <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" class="form-control" name="harga" id="edit_harga" min="0" required>
            </div>
            <div class="form-group">
              <label>Stok</label>
              <input type="number" class="form-control" name="stok" id="edit_stok" min="0" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2026 <a href="#">Twins Coffe</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('AdminLTE-master/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-master/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE-master/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.btn-edit').forEach(function(btn){
    btn.addEventListener('click', function(){
      var id = this.dataset.id;
      var nama = this.dataset.nama;
      var harga = this.dataset.harga;
      var stok = this.dataset.stok;
      var kategori = this.dataset.kategori;
      var image = this.dataset.image;

      // set form action (use URL helper base to avoid path issues)
      var form = document.getElementById('formEdit');
      var base = "{{ url('admin/produk') }}";
      form.action = base + '/' + id;

      // populate fields
      document.getElementById('edit_nama').value = nama;
      document.getElementById('edit_harga').value = harga;
      document.getElementById('edit_stok').value = stok;
      if(kategori){
        document.getElementById('edit_kategori').value = kategori;
      } else {
        document.getElementById('edit_kategori').value = '';
      }
      var imagesBase = "{{ asset('images') }}";
      var preview = document.getElementById('edit_preview');
      if(image){
        preview.src = imagesBase + '/' + image;
      } else {
        preview.src = 'https://via.placeholder.com/300x180?text=No+Image';
      }

      // clear file input
      var fileInput = document.getElementById('edit_image');
      fileInput.value = null;

      // when user picks new image, show preview
      fileInput.onchange = function(e){
        var f = this.files[0];
        if(!f) return;
        var reader = new FileReader();
        reader.onload = function(ev){ preview.src = ev.target.result; };
        reader.readAsDataURL(f);
      };

      $('#editModal').modal('show');
    });
  });
  // Delete trigger -> open modal
  document.querySelectorAll('.btn-delete-trigger').forEach(function(btn){
    btn.addEventListener('click', function(){
      var formWrap = this.closest('.form-delete');
      var id = formWrap.dataset.id;
      var name = formWrap.dataset.name;
      var deleteForm = document.getElementById('deleteForm');
      deleteForm.action = '/admin/produk/' + id;
      document.getElementById('delete_product_name').textContent = name;
      $('#deleteConfirmModal').modal('show');
    });
  });
});
</script>
<script>
// Auto-close success alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function () {
  setTimeout(function () {
    if (window.jQuery) {
      jQuery('.alert.alert-success.alert-dismissible').each(function () { jQuery(this).alert('close'); });
    } else {
      document.querySelectorAll('.alert.alert-success.alert-dismissible').forEach(function(el){ el.style.display = 'none'; });
    }
  }, 5000);
});
</script>
</body>
</html>
