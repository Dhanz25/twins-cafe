// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


// isotope js
var $grid;
$(window).on('load', function () {
    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        })
    });

    $grid = $(".grid").isotope({
        itemSelector: ".all",
        percentPosition: false,
        masonry: {
            columnWidth: ".all"
        }
    })
});

// nice select
$(document).ready(function() {
    $('select').niceSelect();
  });

// /** google_map js **/
// function myMap() {
//     var mapProp = {
//         center: new google.maps.LatLng(40.712775, -74.005973),
//         zoom: 18,
//     };
//     var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
// }

// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});
window.addEventListener("scroll", function () {
    const header = document.getElementById("navbar");
    const navLinks = document.querySelectorAll(".nav-link");
    const sections = document.querySelectorAll("section[id], .hero_area[id]");

    window.addEventListener("scroll", () => {
        /* ===== Navbar background ===== */
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }

        /* ===== Active menu ===== */
        let current = "";

        sections.forEach((section) => {
            const sectionTop = section.offsetTop - 120;
            if (window.scrollY >= sectionTop) {
                current = section.getAttribute("id");
            }
        });

        navLinks.forEach((link) => {
            link.classList.remove("active");
            if (link.getAttribute("href") === "#" + current) {
                link.classList.add("active");
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".filters_menu li");
    const items = document.querySelectorAll(".menu-item");

    buttons.forEach((btn) => {
        btn.addEventListener("click", function () {
            // hapus active semua
            buttons.forEach((b) => b.classList.remove("active"));
            this.classList.add("active");

            const filter = this.getAttribute("data-filter");

            items.forEach((item) => {
                if (
                    filter === "*" ||
                    item.classList.contains(filter.substring(1))
                ) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });
});

 document.addEventListener("DOMContentLoaded", function () {
     const btn = document.getElementById("viewMoreBtn");
     if (!btn) return;

     const items = document.querySelectorAll(".product-item");
     let expanded = false;

     btn.addEventListener("click", function () {
         items.forEach((item) => {
             const index = parseInt(item.dataset.index);
             if (index > 8) {
                 item.classList.toggle("is-hidden", expanded);
             }
         });

         expanded = !expanded;
         btn.textContent = expanded ? "View Less" : "View More";

         // 🔥 WAJIB untuk template filter
         if (window.$ && typeof $.fn.isotope === "function") {
             $(".grid").isotope("layout");
         }
     });
 });


 // =====================
// CART FUNCTION (LARAVEL)
// =====================

function addToCart(id, name, price) {
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            id: id,
            name: name,
            price: price
        })
    })
    .then(res => res.json())
    .then(data => {
        const cartCount = document.getElementById('cart-count');
        if (cartCount) {
            cartCount.innerText = data.count;
        }
    })
    .catch(err => console.error('Cart error:', err));
}

function openCart() {
    fetch("/cart/data")
        .then(res => res.json())
        .then(cart => {
            let html = "";
            let total = 0;

            if (Object.keys(cart).length === 0) {
                html = "<p>Keranjang kosong</p>";
            } else {
                Object.values(cart).forEach(item => {
                    let sub = item.price * item.qty;
                    total += sub;

                    html += `
                        <div class="d-flex justify-content-between mb-2">
                            <div>${item.name} x ${item.qty}</div>
                            <div>Rp ${sub.toLocaleString()}</div>
                        </div>
                    `;
                });

                html += `<hr><h5>Total: Rp ${total.toLocaleString()}</h5>`;
            }

            document.getElementById("cartContent").innerHTML = html;

            new bootstrap.Modal(document.getElementById("cartModal")).show();
        });
}

function showNoResults(show) {
    var container = document.querySelector('.filters-content');
    if (!container) return;
    var noEl = document.getElementById('no-results');
    if (!noEl) {
        noEl = document.createElement('p');
        noEl.id = 'no-results';
        noEl.className = 'text-center mt-4';
        container.appendChild(noEl);
    }
    noEl.innerText = show ? 'Tidak ada menu ditemukan.' : '';
    noEl.style.display = show ? '' : 'none';
}

function debounce(fn, delay) {
    var timer;
    return function() {
        var context = this; var args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function() { fn.apply(context, args); }, delay);
    };
}

function searchMenu() {
    var q = (document.getElementById('searchMenu') || { value: '' }).value.trim().toLowerCase();

    if (window.$ && typeof $.fn.isotope === 'function' && $grid) {
        if (!q) {
            $grid.isotope({ filter: '*' });
            showNoResults(false);
            return;
        }

        $grid.isotope({
            filter: function() {
                var title = $(this).find('.detail-box h5').text().toLowerCase();
                return title.indexOf(q) !== -1;
            }
        });

        // give isotope a moment to update filteredItems
        setTimeout(function() {
            var iso = $grid.data('isotope');
            var count = iso && iso.filteredItems ? iso.filteredItems.length : 0;
            showNoResults(count === 0);
        }, 50);

        return;
    }

    // fallback when isotope not available
    var items = document.querySelectorAll('.filters-content .grid .all');
    var found = false;
    items.forEach(function(item) {
        var titleEl = item.querySelector('.detail-box h5');
        var title = titleEl ? titleEl.textContent.trim().toLowerCase() : '';
        var visible = !q || title.indexOf(q) !== -1;
        item.style.display = visible ? '' : 'none';
        if (visible) found = true;
    });
    showNoResults(!found);
}

document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('searchMenu');
    var btn = document.getElementById('searchBtn');
    if (input) input.addEventListener('input', debounce(searchMenu, 250));
    if (btn) btn.addEventListener('click', searchMenu);
});
