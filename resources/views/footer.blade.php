<footer class="footer-main">
    <div class="ft-wave">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f6f6f6" fill-opacity="1" d="M0,32L26.7,74.7C53.3,117,107,203,160,218.7C213.3,235,267,181,320,176C373.3,171,427,213,480,229.3C533.3,245,587,235,640,224C693.3,213,747,203,800,213.3C853.3,224,907,256,960,234.7C1013.3,213,1067,139,1120,128C1173.3,117,1227,171,1280,208C1333.3,245,1387,267,1413,277.3L1440,288L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path></svg>
    </div>
    <div class="footer px-3 px-sm-0">
       <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div>
                    <div class="text-center">
                        <img src="{{asset('image/shirtinc-logo2.png')}}" width="100" alt="shirt-inc-logo" loading="lazy">
                    </div>
                    <p class="pt-4">Providing you with designs for homeland and movie lovers. We provide products from T-shirts to hoodies in which you can pick the design, color and add it to your preferred T-shirt or hoodie.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-md-0">
                <div>
                    <h4 class="ft-title">Links</h4>
                    <ul>
                        @auth
                          @if (Auth::user()->role)
                          <li><a href="{{url('/dashboard')}}"><i class="fa-solid fa-angle-right"></i>Dashboard</a></li>
                          @endif  
                        @endauth
                        @guest
                        <li><a href="{{url('acc/signin')}}"><i class="fa-solid fa-angle-right"></i> Login</a></li>
                        <li><a href="{{url('acc/signup')}}"><i class="fa-solid fa-angle-right"></i> Register</a></li>
                        @endguest
                        <li><a href="{{ url('/') }}"><i class="fa-solid fa-angle-right"></i> Home</a></li>
                        <li><a href="{{ url('/new-arrival') }}"><i class="fa-solid fa-angle-right"></i> new arrival</a></li>
                        <li><a href="{{ url('/collections') }}"><i class="fa-solid fa-angle-right"></i> Collections</a></li>
                        <li><a href="{{ url('/my-order') }}"><i class="fa-solid fa-angle-right"></i> Orders</a></li>
                        <li><a href="{{ url('/wishlist') }}"><i class="fa-solid fa-angle-right"></i> Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
                <div>
                    <h4 class="ft-title">help</h4>
                    <ul>
                        <li><a href="{{url('privacy-policy')}}"><i class="fa-solid fa-angle-right"></i> Privacy policy</a></li>
                        <li><a href="{{url('return-policy')}}"><i class="fa-solid fa-angle-right"></i>Return Policy</a></li>
                        <li><a href="{{url('shipping-and-delivery-policy')}}"><i class="fa-solid fa-angle-right"></i> Shipping & delivery Policy</a></li>
                        <li><a href="{{url('cancellation-policy')}}"><i class="fa-solid fa-angle-right"></i> Cancellation policy</a></li>
                        <li><a href="{{url('terms-and-conditions')}}"><i class="fa-solid fa-angle-right"></i> Terms and conditions</a></li>
                     
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
                <div>
                    <h4 class="ft-title">contacts</h4>
                    <ul>
                        <li><i class="fa-solid fa-location-arrow"></i>
                         <span>58, MADUKARAI MAIN ROAD, SUNDARAPURAM, Coimbatore,  <br>
                            Tamil Nadu -
                            641023
                        </span>
                        </li>
                        <li><i class="fa-solid fa-square-phone"></i> +91 1234567890</li>
                        <li><i class="fa-solid fa-tty"></i> +91 44 12345678</li>
                        <li><i class="fa-solid fa-envelope"></i> {{$appsetting->email2 ?? 'info@shirtinc.com'}}</li>
                    </ul>
                    <h4 class="ft-title">follow us</h4>
                    <div class="social-icons">
                        <ul class="pe-5 pe-md-0">

                            @if ($appsetting->facebook)
                            <li><a href="{{$appsetting->facebook}}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                            @endif
                            @if ($appsetting->instagram)
                            <li><a href="{{$appsetting->instagram}}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                            @endif
                            @if ($appsetting->youtube)
                            <li><a href="{{$appsetting->youtube}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            @endif
                            @if ($appsetting->twitter)
                            <li><a href="{{$appsetting->twitter}}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                            @endif    
                       
                          </ul>
                    </div>
                </div>
            </div>

        </div>

        <hr class="ft-line">

        <div class="d-flex justify-content-between">
            <p class="m-0">Copyright ©2023 <a class="footer-brand" href="{{url('/')}}">Shirt-inc</a>. All rights reserved.</p>
            <p class="m-0">100% Secure Payment</p>
        </div>
        <hr class="ft-line">
        <div class="text-center">
            <p>Designed by <a href="https://xtremedm.com/" target="_blank" class="footer-brand">Xtreme Digital Marketing</a></p>
        </div>
       </div>
    </div>
</footer>