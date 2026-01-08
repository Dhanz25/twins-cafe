<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Keranjang | Twins Coffee')</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- THEME CSS -->
    <link rel="stylesheet" href="{{ asset('feane-1.0.0/css/style.css') }}">
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
              <a href="/" class="btn btn-outline-dark mt-3">
                    ⬅ Kembali ke Menu
                </a>
            </div>
          </div>
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

                        <div>
                            <h5 class="mb-1">{{ $item['name'] }}</h5>
                            <small class="text-muted">
                                Harga: Rp {{ number_format($item['price'],0,',','.') }}
                            </small>
                        </div>

                        <div class="text-center">
                            <div class="qty-box">
                                <span>Qty</span><br>
                                <strong>{{ $item['qty'] }}</strong>
                            </div>
                        </div>

                        <div class="text-end">
                            <strong class="text-success">
                                Rp {{ number_format($item['price'] * $item['qty'],0,',','.') }}
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
                            $total += $item['price'] * $item['qty'];
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

                    <a href="#" class="btn btn-warning w-100">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>

        @else
            <div class="text-center">
                <p class="fs-5">☕ Keranjang kamu masih kosong</p>
                <a href="/" class="btn btn-warning mt-3">Belanja Sekarang</a>
            </div>
        @endif

    </div>
</section>

</body>
</html>
