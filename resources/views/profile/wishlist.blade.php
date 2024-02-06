@extends('layouts.userpage')

@section('title', 'Profile')

@section('content')

    <!-- ----------------- Account profile  - page ---------------- -->
    @php
        $active = 'wishlist';
    @endphp
  <main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Wishlist</h2>
      <div class="row">
           {{-- ------ acount -- side bar --------- --}}
           <div class="col-lg-3">
            <ul class="account-nav">
                <li>
                    <a href="<?= $url ?>profile/orders" class="menu-link menu-link_us-s<?= $active === "order" ? " menu-link_active" : "" ?>">Orders</a>
                </li>
                <li>
                    <a href="<?= $url ?>profile/address" class="menu-link menu-link_us-s<?= $active === "address" ? " menu-link_active" : "" ?>">Addresses</a>
                </li>
                <li>
                    <a href="<?= $url ?>profile/account" class="menu-link menu-link_us-s<?= $active === "account" ? " menu-link_active" : "" ?>">Account Details</a>
                </li>
                <li>
                    <a href="<?= $url ?>profile/wishlist" class="menu-link menu-link_us-s<?= $active === "wishlist" ? " menu-link_active" : "" ?>">Wishlist</a>
                </li>
                <li>
                  <a href="{{ route('logout') }}" class="menu-link menu-link_us-s"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                class="d-none">
                @csrf
                </form>
            </ul>
        </div>

        {{-- - -- end account side bar ----- --}}
        <div class="col-lg-9">
          <div class="page-content my-account__wishlist">
            <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid">
              <div class="product-card-wrapper">
                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                  <div class="pc__img-wrapper">
                    <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp " width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                        </div><!-- /.pc__img-wrapper -->
                        <div class="swiper-slide">
                          <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                        </div><!-- /.pc__img-wrapper -->
                      </div>
                      <span class="pc__img-prev">
                        <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                          <use href="#icon_prev_sm" />
                        </svg>
                      </span>
                      <span class="pc__img-next">
                        <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                          <use href="#icon_next_sm" />
                        </svg>
                      </span>
                    </div>
                    <button class="btn-remove-from-wishlist">
                      <?= $icon_close ?>
                    </button>
                  </div>

                  <div class="pc__info position-relative">
                    <p class="pc__category">Dresses</p>
                    <h6 class="pc__title">Colorful Jacket</h6>
                    <div class="product-card__price d-flex">
                      <span class="money price">Rs.29</span>
                    </div>

                    <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                      <?= $icon_heart ?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


@endsection
