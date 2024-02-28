 
 
 <!--   Core JS Files   -->
 <script src="admin/assets/js/core/popper.min.js"></script>
 <script src="admin/assets/js/core/bootstrap.min.js"></script>
 {{-- <script src="admin/assets/js/plugins/perfect-scrollbar.min.js"></script> --}}
 <script src="admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
 <script src="admin/assets/js/plugins/chartjs.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 {{-- ---- alert message -- --}}
 @if (session('status'))
    <script>
      Swal.fire("{{ session('status') }}")
    </script>
  @endif



 <script>
   var win = navigator.platform.indexOf('Win') > -1;
   if (win && document.querySelector('#sidenav-scrollbar')) {
     var options = {
       damping: '0.5'
     }
     Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
   }
 </script>
 <!-- Github buttons -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="admin/assets/js/material-dashboard.min.js?v=3.1.0"></script>