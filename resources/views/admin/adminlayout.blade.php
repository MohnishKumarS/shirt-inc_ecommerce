<!DOCTYPE html>
<html>

<head>
    <base href="/public">
     {{-- ------------- css stylesheet ---------------- --}}
    @include('admin.css')

</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('admin.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
             @yield('content')
        </div>
    </main>



    {{-- ------------- js script ---------------- --}}
    @yield('before_script')
    @include('admin.js')

</body>

</html>
