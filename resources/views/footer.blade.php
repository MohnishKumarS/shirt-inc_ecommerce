  <footer class="footer footer_type_2 bordered">
    <div class="footer-top container pb-5">
      <div class="block-newsletter pb-5 mb-5">
        <h3 class="block__title">Subscribe to our newsletter</h3>
        <p>Be the first to get the latest news about trends, promotions, and much more!</p>
        <form action="{{ url('/user-subscribe') }}" method="POST" class="block-newsletter__form">
          @csrf
          <input class="form-control" type="email" name="sub-mail" autocomplete="email" placeholder="Your email address" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}" required>
          <button class="btn btn-secondary fw-medium" type="submit">JOIN</button>
        </form>
      </div>
    </div>
  </footer>
  
  <footer class="footer footer_type_2 dark">
    <div class="footer-middle container">
      <div class="row row-cols-lg-5 row-cols-2">
        <div class="footer-column footer-store-info col-12 mb-4 mb-lg-0">
          <div class="logo text-center">
            <a href="{{ url('/') }}">
              <img src="{{ asset('image/shirtinc-logo2.png') }}" alt="Shirt INC" class="logo__image">
            </a>
          </div><!-- /.logo -->
          <p class="footer-address">58, MADUKARAI MAIN ROAD, SUNDARAPURAM, Coimbatore, Tamil Nadu - 641023</p>
  
          <p class="m-0">
            <strong class="fw-medium">contact@shirt-inc.com</strong>
          </p>
          <p>
            <strong class="fw-medium">+91 (987) 654 0321</strong>
          </p>
  
          <ul class="social-links list-unstyled d-flex flex-wrap mb-0">
            <li>
              <a title="Facebook" aria-describedby="Social Link: Facebook" href="<?= $url ?>shop" class="footer__social-link d-block">
                <i class="fa-brands fa-facebook"></i>
              </a>
            </li>
            <li>
              <a title="Twitter" aria-describedby="Social Link: Twitter" href="<?= $url ?>shop" class="footer__social-link d-block">
                <i class="fa-brands fa-square-x-twitter"></i>
              </a>
            </li>
            <li>
              <a title="Instagram" aria-describedby="Social Link: Instagram" href="<?= $url ?>shop" class="footer__social-link d-block">
                <i class="fa-brands fa-square-instagram"></i>
              </a>
            </li>
            <li>
              <a title="Youtube" aria-describedby="Social Link: Youtube" href="<?= $url ?>shop" class="footer__social-link d-block">
                <i class="fa-brands fa-youtube"></i>
              </a>
            </li>
            <li>
              <a title="Pinterest" aria-describedby="Social Link: Pinterest" href="<?= $url ?>shop" class="footer__social-link d-block">
                <i class="fa-brands fa-pinterest"></i>
              </a>
            </li>
          </ul>
        </div>
  
        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Links</h6>
          <ul class="sub-menu__list list-unstyled">
            @auth
            @if (Auth::user()->role)
            <li class="sub-menu__item">
              <a href="{{url('dashboard')}}" class="menu-link menu-link_us-s">Admin Dashboard</a>
          </li>
            @endif
        @endauth
        @guest
            <li class="sub-menu__item">
              <a href="{{ url('login') }}" class="menu-link menu-link_us-s">Login</a>
          </li>
        @endguest
            <li class="sub-menu__item">
                <a href="{{ url('new-arrival') }}" class="menu-link menu-link_us-s">New Arrivals</a>
            </li>
            <li class="sub-menu__item">
                <a href="{{ url('collections') }}" class="menu-link menu-link_us-s">Collections</a>
            </li>
            <li class="sub-menu__item">
                <a href="{{ url('themes') }}" class="menu-link menu-link_us-s">Themes</a>
            </li>
            {{-- <li class="sub-menu__item">
                <a href="{{ url('mens-collections') }}" class="menu-link menu-link_us-s">Mens Collections</a>
            </li>
            <li class="sub-menu__item">
                <a href="{{ url('womens-collections') }}" class="menu-link menu-link_us-s">Womens Collections</a>
            </li>
            <li class="sub-menu__item">
                <a href="{{ url('unisex-collections') }}" class="menu-link menu-link_us-s">Unisex Collections</a>
            </li> --}}
          </ul>
        </div>
  
        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Help</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item">
                <a href="{{ url('contact')}}" class="menu-link menu-link_us-s">Contact Us</a>
            </li>
            <li class="sub-menu__item">
                <a href="{{ url('privacy-policy')}}" class="menu-link menu-link_us-s">Privacy Policy</a>
            </li>
            <li class="sub-menu__item">
                <a href="{{ url('shipping-and-delivery-policy')}}" class="menu-link menu-link_us-s">Shipping & Delivery Policy</a>
            </li>
            <li class="sub-menu__item">
                <a href="{{ url('return&cancellation-policy') }}" class="menu-link menu-link_us-s">Return & Cancellation Policy</a>
            </li>
            <li class="sub-menu__item">
                <a href="{{ url('terms-and-conditions')}}" class="menu-link menu-link_us-s">Terms & Condition</a>
            </li>
          </ul>
        </div>
  
        <div class="footer-column mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Opening Time</h6>
          <ul class="list-unstyled">
            <li><span class="menu-link">Mon - Fri: 8AM - 9PM</span></li>
            <li><span class="menu-link">Sat: 9AM - 8PM</span></li>
            <li><span class="menu-link">Sun: Closed</span></li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="footer-bottom">
      <div class="container d-sm-flex align-items-center">
        <span class="footer-copyright me-auto">©{{date('Y')}} Shirt Inc</span>
        <div class="footer-settings d-md-flex align-items-center">
          <span class="footer-copyright me-auto">Designed by&nbsp;</span>
          <a class="menu-link menu-link_us-s" href="https://xtremedm.com/" target="_blank">Xtreme Marketing Agency</a>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Mobile Footer Begin -->
  <footer class="footer-mobile container w-100 px-5 d-md-none bg-body">
    <div class="row">
      <div class="col-3">
        <a href="{{url('/')}}" class="footer-mobile__link d-flex flex-column align-items-center">
          <?= $icon_home ?>
          <span>Home</span>
        </a>
      </div>
  
      <div class="col-3">
        <a href="{{url('new-arrival')}}" class="footer-mobile__link d-flex flex-column align-items-center">
          <?= $icon_shop ?>
          <span>Shop</span>
        </a>
      </div>
  
      <div class="col-3">
        <a href="{{ url('/my-cart') }}" class="footer-mobile__link d-flex flex-column align-items-center">
          <div class="position-relative">
            <svg id="icon_shipping" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <svg viewBox="0 0 52 52">
                <path d="M47.125 43.875H43.875V21.125C43.875 20.2276 43.1475 19.5 42.25 19.5H33.3125H25.1875H17.875V7.3125C17.875 5.36027 17.1146 3.52402 15.7328 2.14104C14.3509 0.760398 12.5146 0 10.5625 0C6.53037 0 3.25 3.28037 3.25 7.3125C3.25 8.20991 3.97749 8.9375 4.875 8.9375C5.77251 8.9375 6.5 8.20991 6.5 7.3125C6.5 5.07244 8.32244 3.25 10.5625 3.25C11.6472 3.25 12.6676 3.6727 13.4347 4.43909C14.2023 5.20731 14.625 6.22781 14.625 7.3125V21.125V39.2057C11.8246 39.9291 9.75 42.4768 9.75 45.5C9.75 49.0841 12.6659 52 16.25 52C19.2732 52 21.8209 49.9254 22.5443 47.125H42.25H47.125C48.0225 47.125 48.75 46.3974 48.75 45.5C48.75 44.6026 48.0225 43.875 47.125 43.875ZM31.6875 22.75V26H26.8125V22.75H31.6875ZM16.25 48.75C14.4579 48.75 13 47.2921 13 45.5C13 43.7079 14.4579 42.25 16.25 42.25C18.0421 42.25 19.5 43.7079 19.5 45.5C19.5 47.2921 18.0421 48.75 16.25 48.75ZM22.5443 43.875C21.9552 41.5942 20.1558 39.7948 17.875 39.2057V22.75H23.5625V27.625C23.5625 28.5224 24.29 29.25 25.1875 29.25H33.3125C34.21 29.25 34.9375 28.5224 34.9375 27.625V22.75H40.625V43.875H22.5443Z" fill="currentColor"></path>
              </svg>
            </svg>
            <span class="wishlist-amount d-block position-absolute js-cart-items-count">0</span>
          </div>
          <span>Cart</span>
        </a>
      </div>
  
      <div class="col-3">
       @auth
       <a href="{{ url('profile/account') }}" class="footer-mobile__link d-flex flex-column align-items-center">
        <div class="position-relative">
          <?= $icon_user ?>
        </div>
        <span>Me</span>
      </a>
       @endauth
       @guest
       <a href="{{ route('login') }}" class="footer-mobile__link d-flex flex-column align-items-center">
        <div class="position-relative">
          <?= $icon_user ?>
        </div>
        <span>Me</span>
      </a>
       @endguest
      </div>
    </div>
  </footer>
  <!-- Mobile Footer End-->
  
  
  @php
      $notify = App\Models\Product::where('status','1')->latest()->first();
  @endphp

  @if (!empty($notify))
        <!-- Notification Element End -->
        @php
             $imgs = explode(',', $notify->image);
        @endphp
  <div class="notification-wrapper">
    <div class="notification">
      <button class="close">
        <?= $icon_close ?>
      </button>
      <div class="image">
        @if ($notify->designType)
        <img src="{{asset('image/product/design/'.$notify->design)}}" alt="{{$notify->slug}}" />
        @else
        <img src="{{asset('image/product/'.$imgs[0])}}" alt="{{$notify->slug}}" />
        @endif
      </div>
      <div class="message">
        <h5>ORDER NOW</h5>
        <p><a href="{{url('category/'.$notify->category->slug.'/'.$notify->slug)}}">{{$notify->name}}</a><b>🎉🎉 Show NOW</b> </p>
      </div>
    </div>
  </div>
  <!-- Notification Element End -->
  @endif

