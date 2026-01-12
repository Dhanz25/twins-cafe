<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Keranjang | Twins Coffee')</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- THEME CSS -->
    <link rel="stylesheet" href="{{ asset('feane-1.0.0/css/style.css') }}">
    <style>
      /* Small overrides to better match the home page look */
      body.cart-bg {
        background: linear-gradient(180deg, #fbf6f0 0%, #ead9c8 100%);
      }
      .cart-empty {
        min-height: 42vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        color: #4a4a4a;
      }
      .cart-empty .dot {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: radial-gradient(circle at 30% 30%, #8a6273 0%, #d9c7d9 60%);
        box-shadow: 0 0 0 6px rgba(142,112,132,0.12);
        display: inline-block;
      }
      .btn-cta {
        background: #f7b500;
        border: none;
        color: #111;
        padding: 10px 28px;
        border-radius: 8px;
        box-shadow: 0 4px 0 rgba(0,0,0,0.06);
        font-weight: 500;
      }
      .cart-item { background: transparent; border-radius: 8px; }
      .cart-total { background: rgba(255,255,255,0.9); border-radius: 8px; }

      /* Responsive tweaks for cart page */
      @media (max-width: 767.98px) {
        .cart-item {
          padding: 12px;
        }
        .cart-item .d-flex.justify-content-between {
          flex-direction: column !important;
          align-items: flex-start !important;
          gap: 12px;
        }
        .cart-item img {
          width: 64px !important;
          height: 64px !important;
          object-fit: cover;
        }
        .cart-item .qty-box {
          margin-top: 6px;
          display: flex;
          align-items: center;
          gap: 8px;
        }
        /* Make price row span full width and align right */
        .cart-item .text-end {
          width: 100%;
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        .cart-item .text-end strong { margin-left: auto; }
        .cart-total { margin-top: 1rem; }
        .heading_container { padding-left: 12px; padding-right: 12px; }
        .container { padding-left: 12px; padding-right: 12px; }
      }
    </style>
</head>
<body class="sub_page cart-bg">

<nav>
    <!-- header section strats -->
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <div class="container">
          <a class="navbar-brand" href="#">
            <span>
              Twins Coffee
            </span>
          </a>
          {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          </button> --}}

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              {{-- <li class="nav-item">
                <a class="nav-link" href="#testimoni">Testimoni</a>
              </li> --}}
            </ul>
            <div class="user_option">
              <a href="" class="user_link">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                    </g>
                  </g>
                </svg>
              </a>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
              <a href="{{ route('menu.index') }}" class="btn btn-outline-dark mt-3">
                    ⬅ Kembali ke Menu
                </a>
            </div>
          </div>

          <!-- Mobile fixed back button (top-right) -->
          <a href="{{ route('menu.index') }}" class="fixed-back-btn btn btn-outline-dark d-lg-none">⬅ Kembali ke Menu</a>

      </div>
        </nav> 
    <!-- end header section -->
</nav>

<section class="food_section layout_padding">
    <div class="container">

        <div class="heading_container heading_center mb-4">
            <h2>Keranjang Belanja</h2>
            <p class="text-muted">Home / Menu / Cart</p>
        </div>

        @if(session('cart') && count(session('cart')) > 0)
        <div class="row">
            <!-- LIST CART -->
            <div class="col-lg-8">

                @foreach(session('cart') as $item)
                <div class="cart-item mb-3 p-3">
                    <div class="d-flex justify-content-between align-items-center">

                        <div class="d-flex align-items-center" style="gap:12px;">
                          <img src="{{ $item['image'] ?? asset('images/placeholder.png') }}" alt="{{ $item['nama'] ?? 'produk' }}" class="rounded" style="width:80px; height:80px; object-fit:cover;" />

                          <div>
                            <h5 class="mb-1">{{ $item['nama'] ?? $item['name'] ?? 'Produk' }}</h5>
                            <small class="text-muted">
                              Harga: Rp {{ number_format($item['harga'] ?? $item['price'] ?? 0,0,',','.') }}
                            </small>
                          </div>
                        </div>

                        <div class="text-center">
                            <div class="qty-box">
                                <span>Qty</span><br>
                                <strong>{{ $item['qty'] ?? 1 }}</strong>
                            </div>
                        </div>

                        <div class="text-end">
                            <strong class="text-success">
                              Rp {{ number_format(($item['subtotal'] ?? (($item['harga'] ?? $item['price'] ?? 0) * ($item['qty'] ?? 1))),0,',','.') }}
                            </strong>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

            <!-- TOTAL -->
            <div class="col-lg-4">
                <div class="cart-total p-4">
                    <h4>Total Belanja</h4>
                    <hr>

                    @php
                        $total = 0;
                        foreach(session('cart') as $item) {
                        $price = isset($item['harga']) ? intval($item['harga']) : (isset($item['price']) ? intval($item['price']) : 0);
                        $qty = isset($item['qty']) ? intval($item['qty']) : 1;
                        $subtotal = isset($item['subtotal']) ? intval($item['subtotal']) : ($price * $qty);
                        $total += $subtotal;
                        }
                    @endphp

                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <strong>Rp {{ number_format($total,0,',','.') }}</strong>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Total</span>
                        <strong class="text-success">
                            Rp {{ number_format($total,0,',','.') }}
                        </strong>
                    </div>

                    <form method="POST" action="{{ route('cart.clear') }}" onsubmit="return confirm('Yakin ingin mengosongkan keranjang?');">
                      @csrf
                      <button type="submit" class="btn btn-outline-danger w-100 mb-2">Kosongkan Keranjang</button>
                    </form>

                    <form id="checkoutForm" method="POST" action="{{ route('checkout.store') }}" data-total="Rp {{ number_format($total,0,',','.') }}">
                      @csrf
                      <div class="mb-2">
                        <input id="no_meja_input" name="no_meja" type="number" min="1" class="form-control" placeholder="No. Meja" required>
                      </div>
                      <button id="checkoutBtn" type="submit" class="btn btn-warning w-100">Checkout Sekarang</button>
                    </form>
                </div>
            </div>
        </div>

        @else
          <div class="cart-empty">
            <div class="status d-flex align-items-center gap-3 justify-content-center">
              <span class="dot"></span>
              <p class="fs-5 mb-0">Keranjang kamu masih kosong</p>
            </div>
            <a href="/" class="btn btn-cta mt-3">Belanja Sekarang</a>
          </div>
        @endif

    </div>
</section>

<script>
  // Confirmation before submitting checkout form
  (function(){
    var form = document.getElementById('checkoutForm');
    if (!form) return;

    form.addEventListener('submit', function(e){
      e.preventDefault();
      var meja = document.getElementById('no_meja_input')?.value || '-';
      var totalDisplay = form.getAttribute('data-total') || '';
      var msg = 'Are you sure you want to place this order?\n\n';
      msg += 'Table Number: ' + meja + '\n';
      msg += 'Total Payment: ' + totalDisplay + '\n\n';
      msg += 'Confirm to proceed.';

      if (confirm(msg)) {
        form.submit();
      }
    });
  })();
</script>

</body>
</html>
