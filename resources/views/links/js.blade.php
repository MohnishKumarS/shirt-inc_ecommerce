{{-- ------------ sweatalert ------------- --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- ----- jquery --------- --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- ----- bootstrap --------- --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

{{-- ------------- search auto complete  --}}
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

{{-- -------------- owl carousel ---------------- --}}

<script src="{{ asset('js/owl.carousel.min.js') }}"></script>


{{-- -------------- toast popup ---------------- --}}
<script src="{{ asset('toast-popup/toast.script.js') }}"></script>

{{-- ------------ customs js -------------- --}}
<script src="{{ asset('js/script.js') }}"></script>

{{-- ------------ loading animate js -------------- --}}
<script src="{{ asset('js/loading.js') }}"></script>

{{-- ------------ payment checkout js -------------- --}}
<script src="{{ asset('js/payment.js') }}"></script>



@if (session('status'))
    <script>
        Swal.fire("{{ session('status') }}")
    </script>
@endif

@if (session('toast'))
    <script>
        $.Toast("{{ session('toast') }}", "{{ session('text') }}", "{{ session('type') }}", {
            has_icon: true,
            has_close_btn: true,
            position_class: 'toast-top-right',
            stack: true,
            fullscreen: false,
            timeout: 6000,
            sticky: false,
            has_progress: true,
            rtl: false,
        });
    </script>
@endif




{{-- ------------ live chat ---------------- --}}
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/64b9336594cf5d49dc64cc8e/1h5pn1hdk';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

{{-- -------------- search  auto complete ------------- --}}

<script>
    var availableTags = [];
    $.ajax({
        type: "get",
        url: "/product-list",

        success: function(data) {
            startAutocomplete(data)

        }
    });

    function startAutocomplete(arr) {
        $("#search-product-list").autocomplete({
            source: arr
        });
    }


    // ------------- owl-carousel ------------------


    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        dots: false,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },

            1000: {
                items: 4
            }
        }
    })
</script>
