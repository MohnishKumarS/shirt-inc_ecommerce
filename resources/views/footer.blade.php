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
  
  <!-- Sitemap Modal Begin -->
  <div class="modal fade" id="siteMap" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
      <div class="sitemap d-flex">
        <div class="w-50 d-none d-lg-block">
          <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp" alt="Site map" class="sitemap__bg">
        </div>
        <div class="sitemap__links w-50 flex-grow-1">
          <div class="modal-content">
            <div class="modal-header">
              <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active rounded-1 text-uppercase" id="pills-item-1-tab" data-bs-toggle="pill" href="#pills-item-1" role="tab" aria-controls="pills-item-1" aria-selected="true">WOMEN</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-1 text-uppercase" id="pills-item-2-tab" data-bs-toggle="pill" href="#pills-item-2" role="tab" aria-controls="pills-item-2" aria-selected="false">MEN</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link rounded-1 text-uppercase" id="pills-item-3-tab" data-bs-toggle="pill" href="#pills-item-3" role="tab" aria-controls="pills-item-3" aria-selected="false">KIDS</a>
                </li>
              </ul>
              <button type="button" class="btn-close-lg" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
            <div class="modal-body">
              <div class="tab-content col-12" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-item-1" role="tabpanel" aria-labelledby="pills-item-1-tab">
                  <div class="row">
                    <ul class="nav nav-tabs list-unstyled col-5 d-block" id="myTab" role="tablist">
                      <li class="nav-item position-relative" role="presentation">
                        <a class="nav-link nav-link_rline active" id="tab-item-1-tab" data-bs-toggle="tab" href="#tab-item-1" role="tab" aria-controls="tab-item-1" aria-selected="true"><span class="rline-content">WOMEN</span></a>
                      </li>
                      <li class="nav-item position-relative" role="presentation">
                        <a class="nav-link nav-link_rline" id="tab-item-2-tab" data-bs-toggle="tab" href="#tab-item-2" role="tab" aria-controls="tab-item-2" aria-selected="false"><span class="rline-content">MAN</span></a>
                      </li>
                      <li class="nav-item position-relative" role="presentation">
                        <a class="nav-link nav-link_rline" id="tab-item-3-tab" data-bs-toggle="tab" href="#tab-item-3" role="tab" aria-controls="tab-item-3" aria-selected="false"><span class="rline-content">KIDS</span></a>
                      </li>
                      <li class="nav-item position-relative" role="presentation">
                        <a class="nav-link nav-link_rline" href="<?= $url ?>shop"><span class="rline-content">HOME</span></a>
                      </li>
                      <li class="nav-item position-relative" role="presentation">
                        <a class="nav-link nav-link_rline" href="<?= $url ?>shop"><span class="rline-content">COLLECTION</span></a>
                      </li>
                      <li class="nav-item position-relative" role="presentation">
                        <a class="nav-link nav-link_rline text-red" href="<?= $url ?>shop">SALE UP TO 50% OFF</a>
                      </li>
                    </ul>
  
                    <div class="tab-content col-7" id="myTabContent">
                      <div class="tab-pane fade show active" id="tab-item-1" role="tabpanel" aria-labelledby="tab-item-1-tab">
                        <ul class="sub-menu list-unstyled">
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">New</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Best Sellers</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Collaborations®</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Sets</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Denim</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Jackets & Coats</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Overshirts</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Trousers</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Jeans</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Dresses</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Sweatshirts and Hoodies</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">T-shirts & Tops</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Shirts & Blouses</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Shorts and Bermudas</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Shoes</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Accessories</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Bags</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Gift Card</a>
                          </li>
                        </ul><!-- /.sub-menu -->
                      </div>
                      <div class="tab-pane fade" id="tab-item-2" role="tabpanel" aria-labelledby="tab-item-2-tab">
                        <ul class="sub-menu list-unstyled">
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Best Sellers</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">New</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Sets</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Denim</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Collaborations®</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Trousers</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Jackets & Coats</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Overshirts</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Dresses</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Jeans</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Sweatshirts and Hoodies</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Gift Card</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Shirts & Blouses</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">T-shirts & Tops</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Shorts and Bermudas</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Accessories</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Shoes</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Bags</a>
                          </li>
                        </ul><!-- /.sub-menu -->
                      </div>
                      <div class="tab-pane fade" id="tab-item-3" role="tabpanel" aria-labelledby="tab-item-3-tab">
                        <ul class="sub-menu list-unstyled">
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Gift Card</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Collaborations®</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Sets</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Denim</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">New</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Best Sellers</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Overshirts</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Jackets & Coats</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Jeans</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Trousers</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Shorts and Bermudas</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Shoes</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Accessories</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Dresses</a>
                          </li>
                          <li class="sub-menu__item">
                            <a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Bags</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-item-2" role="tabpanel" aria-labelledby="pills-item-2-tab">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                  Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.
                </div>
                <div class="tab-pane fade" id="pills-item-3" role="tabpanel" aria-labelledby="pills-item-3-tab">
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                  Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Sitemap Modal End -->
  
  <!-- Cart Drawer Begin -->
  <div class="aside aside_right overflow-hidden cart-drawer" id="cartDrawer">
    <div class="aside-header d-flex align-items-center">
      <h3 class="text-uppercase fs-6 mb-0">SHOPPING BAG ( <span class="cart-amount js-cart-items-count">1</span> )
      </h3>
      <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
    </div>
  
    <div class="aside-content cart-drawer-items-list">
      <div class="cart-drawer-item d-flex position-relative">
        <div class="position-relative">
          <img loading="lazy" class="cart-drawer-item__img" src="<?= $url ?>assets/images/mocks/product-1.webp" alt="Product 2">
        </div>
        <div class="cart-drawer-item__info flex-grow-1">
          <h6 class="cart-drawer-item__title fw-normal">Bewakoof Men's Printed 100% Cotton T-Shirt</h6>
          <p class="cart-drawer-item__option text-secondary">Color: Black</p>
          <p class="cart-drawer-item__option text-secondary">Size: L</p>
          <div class="d-flex align-items-center justify-content-between mt-1">
            <div class="qty-control position-relative">
              <input type="number" name="quantity" value="1" min="1" class="qty-control__number border-0 text-center">
              <div class="qty-control__reduce text-start">-</div>
              <div class="qty-control__increase text-end">+</div>
            </div><!-- .qty-control -->
            <span class="cart-drawer-item__price money price">Rs.499</span>
          </div>
        </div>
  
        <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>
      </div>
  
      <hr class="cart-drawer-divider">
  
      <div class="cart-drawer-item d-flex position-relative">
        <div class="position-relative">
          <img loading="lazy" class="cart-drawer-item__img" src="<?= $url ?>assets/images/mocks/product-3.webp" alt="Product 3">
        </div>
        <div class="cart-drawer-item__info flex-grow-1">
          <h6 class="cart-drawer-item__title fw-normal">Bewakoof Men's Printed 100% Cotton T-Shirt</h6>
          <p class="cart-drawer-item__option text-secondary">Color: Black</p>
          <p class="cart-drawer-item__option text-secondary">Size: L</p>
          <div class="d-flex align-items-center justify-content-between mt-1">
            <div class="qty-control position-relative">
              <input type="number" name="quantity" value="1" min="1" class="qty-control__number border-0 text-center">
              <div class="qty-control__reduce text-start">-</div>
              <div class="qty-control__increase text-end">+</div>
            </div><!-- .qty-control -->
            <span class="cart-drawer-item__price money price">Rs.499</span>
          </div>
        </div>
  
        <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>
      </div>
  
      <hr class="cart-drawer-divider">
  
      <div class="cart-drawer-item d-flex position-relative">
        <div class="position-relative">
          <img loading="lazy" class="cart-drawer-item__img" src="<?= $url ?>assets/images/mocks/product-2.png" alt="Product 1">
        </div>
        <div class="cart-drawer-item__info flex-grow-1">
          <h6 class="cart-drawer-item__title fw-normal">Bewakoof Men's Printed 100% Cotton T-Shirt</h6>
          <p class="cart-drawer-item__option text-secondary">Color: Black</p>
          <p class="cart-drawer-item__option text-secondary">Size: L</p>
          <div class="d-flex align-items-center justify-content-between mt-1">
            <div class="qty-control position-relative">
              <input type="number" name="quantity" value="1" min="1" class="qty-control__number border-0 text-center">
              <div class="qty-control__reduce text-start">-</div>
              <div class="qty-control__increase text-end">+</div>
            </div><!-- .qty-control -->
            <span class="cart-drawer-item__price money price">Rs.499</span>
          </div>
        </div>
  
        <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>
      </div>
  
      <hr class="cart-drawer-divider">
  
    </div>
  
    <div class="cart-drawer-actions position-absolute start-0 bottom-0 w-100">
      <hr class="cart-drawer-divider">
      <div class="d-flex justify-content-between">
        <h6 class="fs-base fw-medium">SUBTOTAL:</h6>
        <span class="cart-subtotal fw-medium">Rs.2024.00</span>
      </div>
      <a href="<?= $url ?>cart" class="btn btn-light mt-3 d-block">View Cart</a>
      <a href="<?= $url ?>checkout" class="btn btn-primary mt-3 d-block">Checkout</a>
    </div>
  </div>
  <!-- Cart Drawer End -->
  
  <!-- Login Drawer Being -->
  <div class="aside aside_right overflow-hidden customer-forms" id="customerForms">
    <div class="customer-forms__wrapper d-flex position-relative">
      <div class="customer__login">
        <div class="aside-header d-flex align-items-center">
          <h3 class="text-uppercase fs-6 mb-0">Login</h3>
          <button class="btn-close-lg js-close-aside ms-auto"></button>
        </div>
  
        <form action="./" method="POST" class="aside-content">
          <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control form-control_gray" id="customerNameEmailInput" placeholder="name@example.com">
            <label for="customerNameEmailInput">Username or email address *</label>
          </div>
  
          <div class="pb-3"></div>
  
          <div class="form-label-fixed mb-3">
            <label for="customerPasswordInput" class="form-label">Password *</label>
            <input name="password" id="customerPasswordInput" class="form-control form-control_gray" type="password" placeholder="********">
          </div>
  
          <div class="d-flex align-items-center mb-3 pb-2">
            <div class="form-check mb-0">
              <input name="remember" class="form-check-input form-check-input_fill" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label text-secondary" for="flexCheckDefault">Remember me</label>
            </div>
            <a href="<?= $url ?>reset-password" class="btn-text ms-auto">Lost password?</a>
          </div>
  
          <button class="btn btn-primary w-100 text-uppercase" type="submit">Log In</button>
  
          <div class="customer-option mt-4 text-center">
            <span class="text-secondary">No account yet?</span>
            <a href="<?= $url ?>register" class="btn-text js-show-register">Create Account</a>
          </div>
        </form>
      </div>
  
      <div class="customer__register">
        <div class="aside-header d-flex align-items-center">
          <h3 class="text-uppercase fs-6 mb-0">Create an account</h3>
          <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
        </div>
  
        <form action="./" method="POST" class="aside-content">
          <div class="form-floating mb-4">
            <input name="username" type="text" class="form-control form-control_gray" id="registerUserNameInput" placeholder="Username">
            <label for="registerUserNameInput">Username</label>
          </div>
  
          <div class="pb-1"></div>
  
          <div class="form-floating mb-4">
            <input name="email" type="email" class="form-control form-control_gray" id="registerUserEmailInput" placeholder="user@company.com">
            <label for="registerUserEmailInput">Email address *</label>
          </div>
  
          <div class="pb-1"></div>
  
          <div class="form-label-fixed mb-4">
            <label for="registerPasswordInput" class="form-label">Password *</label>
            <input name="password" id="registerPasswordInput" class="form-control form-control_gray" type="password" placeholder="*******">
          </div>
  
          <p class="text-secondary mb-4">Your personal data will be used to support your experience throughout
            this website, to manage access to your account, and for other purposes described in our privacy
            policy.</p>
  
          <button class="btn btn-primary w-100 text-uppercase" type="submit">Register</button>
  
          <div class="customer-option mt-4 text-center">
            <span class="text-secondary">Already have account?</span>
            <a href="<?= $url ?>shop" class="btn-text js-show-login">Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Login Drawer End -->
  
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

