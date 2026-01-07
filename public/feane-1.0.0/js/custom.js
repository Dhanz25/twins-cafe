// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


// isotope js
$(window).on('load', function () {
    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        })
    });

    var $grid = $(".grid").isotope({
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
