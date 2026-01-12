
    <!-- header section strats -->
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <div class="container">
          <style>
            .navbar-toggler{background:transparent;border:0; font-size:24px; display:none}
            .navbar-toggler-icon{display:inline-block}
            @media (max-width:991.98px){
              .navbar-toggler{display:block}
              .collapse.navbar-collapse{display:block}
              .collapse.navbar-collapse.show{display:block}
              .navbar-nav.mx-auto{flex-direction:column;text-align:left}
              .user_option{margin-top:10px;text-align:center}
              .navbar-brand{flex:0 0 auto; text-align:left; padding-left:18px}
            }
          </style>
          <a class="navbar-brand" href="#">
            <span>
              Twins Coffee
            </span>
          </a>
          <button class="navbar-toggler" type="button" id="navbar-toggler" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarSupportedContent">
            <span class="navbar-toggler-icon">&#9776;</span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link active" href="#home">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#menu">Menu</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="#testimoni">Testimoni</a>
              </li> --}}
            </ul>
            <div class="user_option">
              
              <a class="cart_link" href="/cart" style="position: relative;">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
</svg>

  <span id="cart-count"
        style="
          position:absolute;
          top:-5px;
          right:-10px;
          background:red;
          color:white;
          font-size:12px;
          padding:2px 6px;
          border-radius:50%;
        ">
    {{ collect(session('cart', []))->sum('qty') }}
  </span>
</a>
            </div>
          </div>
      </div>
            <script>
              document.addEventListener('DOMContentLoaded', function(){
                console.debug('navbar script start');
                var btn = document.getElementById('navbar-toggler');
                var collapse = document.getElementById('navbarSupportedContent');

                // create backdrop element (reusable) and insert safely (avoid insertBefore on wrong parent)
                var backdrop = document.createElement('div');
                backdrop.className = 'mobile-backdrop';
                var navElem = document.querySelector('nav');
                try {
                  if (navElem && navElem.parentNode) {
                    // insert into the nav's actual parent to avoid DOMException
                    navElem.parentNode.insertBefore(backdrop, navElem);
                  } else {
                    document.body.appendChild(backdrop);
                  }
                  console.debug('navbar: backdrop inserted', backdrop, navElem && navElem.parentNode);
                } catch (err) {
                  console.error('navbar: failed to insert backdrop, falling back to append', err);
                  try { document.body.appendChild(backdrop); console.debug('navbar: backdrop appended as fallback'); } catch (err2) { console.error('navbar: backdrop append failed', err2); }
                }

                function openMenu(){
                  collapse.classList.add('show');
                  // ensure sidebar sits above backdrop/header
                  collapse.style.zIndex = '10005';
                  btn.setAttribute('aria-expanded','true');
                  backdrop.classList.add('show');
                  // ensure backdrop sits under the menu
                  backdrop.style.zIndex = '10001';
                  document.body.style.overflow = 'hidden';
                  // change toggler to X
                  btn.querySelector('.navbar-toggler-icon').innerHTML = '&times;';
                }

                function closeMenu(){
                  collapse.classList.remove('show');
                  // clear inline z-index hints
                  collapse.style.zIndex = '';
                  btn.setAttribute('aria-expanded','false');
                  backdrop.classList.remove('show');
                  backdrop.style.zIndex = '';
                  document.body.style.overflow = '';
                  // change toggler back to hamburger
                  btn.querySelector('.navbar-toggler-icon').innerHTML = '&#9776;';
                }

                if(btn && collapse){
                  // debug helper: enable capture-phase click logger when ?debugNav=1 in URL
                  if (window.location.search.indexOf('debugNav') !== -1) {
                    console.debug('nav debug: enabling capture click logger');
                    document.addEventListener('click', function(e){
                      var el = document.elementFromPoint(e.clientX, e.clientY);
                      console.debug('GLOBAL CLICK', { x: e.clientX, y: e.clientY, target: e.target, topAtPoint: el });
                    }, true);
                    if (btn) { btn.style.outline = '2px solid rgba(255,0,0,0.9)'; btn.style.zIndex = '10006'; }
                  }

                  console.debug('navbar init - button found:', !!btn, 'collapse found:', !!collapse);
                  btn.addEventListener('click', function(e){
                    console.debug('navbar-toggler clicked, aria-expanded before:', btn.getAttribute('aria-expanded'));
                    var isShown = collapse.classList.contains('show');
                    if(isShown){
                      closeMenu();
                    } else {
                      openMenu();
                    }
                    console.debug('navbar state after click, show:', collapse.classList.contains('show'), 'aria-expanded:', btn.getAttribute('aria-expanded'));
                  });

                  // close when clicking a link (navigation) or cart/user link
                  var links = collapse.querySelectorAll('a.nav-link, .user_option a, .cart_link');
                  links.forEach(function(l){ l.addEventListener('click', function(e){ console.debug('nav link clicked:', e.target); closeMenu(); }); });

                  // clicking backdrop closes menu
                  backdrop.addEventListener('click', function(){ console.debug('backdrop clicked'); closeMenu(); });
                }

              });
            </script>
        </nav>
    <!-- end header section -->
