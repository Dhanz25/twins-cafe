<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Twins Coffe | Kategori</title>
  <link rel="icon" href="{{ asset('images/logoTwins_coffe.png') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.index') }}" class="brand-link">
      <img src="{{ asset('images/Logo.jpeg') }}" alt="Twins Coffe" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Twins Coffe</span>
    </a>

    <div class="sidebar">
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

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.kategori') }}" class="nav-link active">
              <i class="nav-icon fas fa-tags"></i>
              <p>Kategori</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.produk') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.transaksi') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Data Transaksi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="event.preventDefault(); if(confirm('Yakin ingin logout?')) { document.getElementById('sidebar-logout-form').submit(); }">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>Logout</p>
            </a>
            <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        {{-- Alert Messages --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="fas fa-exclamation-triangle mr-1"></i> {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
        @endif

        <div class="row">
          {{-- Form Tambah Kategori --}}
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus-circle mr-1"></i> Tambah Kategori</h3>
              </div>
              <form action="{{ route('admin.kategori.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" placeholder="Contoh: Manual Brew" value="{{ old('nama_kategori') }}" required>
                    @error('nama_kategori')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-save mr-1"></i> Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>

          {{-- Tabel Daftar Kategori --}}
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-tags mr-1"></i> Daftar Kategori</h3>
                <div class="card-tools">
                  <span class="badge badge-info">Total: {{ $kategoris->count() }}</span>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 50px">No</th>
                      <th>Nama Kategori</th>
                      <th style="width: 100px">Jml Produk</th>
                      <th style="width: 160px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($kategoris as $i => $kategori)
                    <tr id="row-{{ $kategori->id_kategori }}">
                      <td>{{ $i + 1 }}</td>
                      <td>
                        {{-- Display mode --}}
                        <span class="display-name">{{ $kategori->nama_kategori }}</span>
                        {{-- Edit mode --}}
                        <form action="{{ route('admin.kategori.update', $kategori->id_kategori) }}" method="POST" class="edit-form d-none">
                          @csrf
                          @method('PUT')
                          <div class="input-group input-group-sm">
                            <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-success btn-sm" title="Simpan"><i class="fas fa-check"></i></button>
                              <button type="button" class="btn btn-secondary btn-sm btn-cancel-edit" title="Batal"><i class="fas fa-times"></i></button>
                            </div>
                          </div>
                        </form>
                      </td>
                      <td><span class="badge badge-secondary">{{ $kategori->produk_count }}</span></td>
                      <td>
                        <button class="btn btn-warning btn-sm btn-edit" title="Edit">
                          <i class="fas fa-edit"></i> Edit
                        </button>
                        <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kategori {{ $kategori->nama_kategori }}?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                            <i class="fas fa-trash"></i> Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" class="text-center text-muted py-4">
                        <i class="fas fa-folder-open fa-2x mb-2 d-block"></i>
                        Belum ada kategori. Silakan tambahkan kategori baru.
                      </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2026 <a href="#">Twins Coffe</a>.</strong> All rights reserved.
  </footer>
</div>

<!-- jQuery -->
<script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-master/dist/js/adminlte.min.js') }}"></script>

<script>
  // Inline edit toggle
  document.querySelectorAll('.btn-edit').forEach(function(btn){
    btn.addEventListener('click', function(){
      var row = this.closest('tr');
      row.querySelector('.display-name').classList.add('d-none');
      row.querySelector('.edit-form').classList.remove('d-none');
      this.closest('td').querySelector('form[onsubmit]').classList.add('d-none');
      this.classList.add('d-none');
    });
  });

  document.querySelectorAll('.btn-cancel-edit').forEach(function(btn){
    btn.addEventListener('click', function(){
      var row = this.closest('tr');
      row.querySelector('.display-name').classList.remove('d-none');
      row.querySelector('.edit-form').classList.add('d-none');
      row.querySelector('.btn-edit').classList.remove('d-none');
      row.querySelector('td:last-child form[onsubmit]').classList.remove('d-none');
    });
  });
</script>
</body>
</html>
