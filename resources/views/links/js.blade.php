
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
{{-- <script type="text/javascript">
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
</script> --}}
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

</script>
