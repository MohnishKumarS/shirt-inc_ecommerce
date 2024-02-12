
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- --- links -- --}}
    {{-- @include('links.css') --}}

    <!-- Favi-icon -->
    <link rel="shortcut icon" href="{{ asset('image/shirtinc-logo.png') }}" type="image/x-icon">

   @include('configz.icons')

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/icons/icon.css')}}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/vendors/swiper/swiper.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendors/toaster/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/styles/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/styles/custom.css')}}" type="text/css">

    {{-- --------------- toast popup ---------------- --}}

<link rel="stylesheet" href="{{ asset('toast-popup/toast.style.min.css') }}">



    <link rel="canonical" href="https://shirt-inc.com/">
    <meta name="robots" content="index, follow, all">
    <meta name="googlebot" content="index, follow">
    <meta name="coverage" content="India">
    <meta name="distribution" content="Global">
    <meta name="audience" content="all">
    <meta name="document-type" content="Public">
    <!-- Primary Meta Tags -->

    <title>Online Shopping for Men & Women Clothing</title>
    <meta name="title" content="Online Shopping for Men & Women Clothing" />
    <meta name="description"
        content="Shop for t-shirts for men and women online at Shirt-Inc the one-stop destination for all official merchandise of superheroes and movies" />

    <!-- Open Graph / Facebook -->

    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.shirt-inc.com/" />
    <meta property="og:title" content="Online Shopping for Men & Women Clothing" />
    <meta property="og:description"
        content="Shop for t-shirts for men and women online at Shirt-Inc the one-stop destination for all official merchandise of superheroes and movies" />
    <meta property="og:image" content="https://metatags.io/images/meta-tags.png" />

    <!-- Twitter -->

    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://www.shirt-inc.com/" />
    <meta property="twitter:title" content="Online Shopping for Men & Women Clothing" />
    <meta property="twitter:description"
        content="Shop for t-shirts for men and women online at Shirt-Inc the one-stop destination for all official merchandise of superheroes and movies" />
    <meta property="twitter:image" content="https://metatags.io/images/meta-tags.png" />

      <!-- styles -->
    @stack('styles')

    <style>
        /* <!-- ---------------------------------------------
^^^^^^^^^^^^^ ~~ paginate   ~~  ^^^^^^^^^^^^^^
 --------------------------------------------- --> */
.w-5 {
    width: 3% !important;
}

.paginate-pro .flex {
    height: 5% !important;
}

.paginate-pro .text-sm {
    display: initial;
}

.paginate-pro nav>div {
    margin-bottom: 10px;
}

.paginate-pro nav p {
    display: inline-block !important;
}

.paginate-pro nav a:hover {
    color: #ff5400;
}

.paginate-pro nav>div:first-child{
    display: none;
}

    </style>
</head>

<body>

    <!-- ---------------------------------------------
        ^^^^^^^^^^^^^ ~~ header   ~~  ^^^^^^^^^^^^^^
         --------------------------------------------- -->
    @include('navbar')


    <!-- ---------------------------------------------
        ^^^^^^^^^^^^^ ~~ content   ~~  ^^^^^^^^^^^^^^
         --------------------------------------------- -->

  <main>
    @yield('content')
  </main>



    <!-- ---------------------------------------------
        ^^^^^^^^^^^^^ ~~ footer   ~~  ^^^^^^^^^^^^^^
         --------------------------------------------- -->

    @include('footer')


    <!-- ---------------------------------------------
        ^^^^^^^^^^^^^ ~~ js include   ~~  ^^^^^^^^^^^^^^
         --------------------------------------------- -->



    <script src="{{asset('assets/scripts/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('assets/vendors/swiper/swiper.min.js')}}"></script>
<script src="{{asset('assets/vendors/toaster/script.js')}}"></script>

<script src="{{asset('assets/scripts/main.js')}}"></script>

{{-- ------------ sweatalert ------------- --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- ------------- search auto complete  --}}
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


{{-- -------------- toast popup ---------------- --}}
<script src="{{ asset('toast-popup/toast.script.js') }}"></script>


{{-- ------------ customs js -------------- --}}
<script src="{{ asset('js/script.js') }}"></script>

{{-- ------------ payment checkout js -------------- --}}
<script src="{{ asset('js/payment.js') }}"></script>


@include('links.js')

    @yield('scripts')
      <!-- Scripts -->
    @stack('scripts')

</body>

</html>
