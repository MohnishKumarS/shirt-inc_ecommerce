{{-- ALERT MESSAGE --}}
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


      // header offer message
  var TxtRotate = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
  };

  TxtRotate.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) {
      delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      this.loopNum++;
      delta = 100;
    }

    setTimeout(function () {
      that.tick();
    }, delta);
  };

  window.onload = function () {
    var elements = document.getElementsByClassName('txt-rotate');
    for (var i = 0; i < elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-rotate');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
        new TxtRotate(elements[i], JSON.parse(toRotate), period);
      }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
    document.body.appendChild(css);
  };

</script>
