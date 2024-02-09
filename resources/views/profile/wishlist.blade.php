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
                            <a href="<?= $url ?>profile/orders"
                                class="menu-link menu-link_us-s<?= $active === 'order' ? ' menu-link_active' : '' ?>">Orders</a>
                        </li>
                        <li>
                            <a href="<?= $url ?>profile/address"
                                class="menu-link menu-link_us-s<?= $active === 'address' ? ' menu-link_active' : '' ?>">Addresses</a>
                        </li>
                        <li>
                            <a href="<?= $url ?>profile/account"
                                class="menu-link menu-link_us-s<?= $active === 'account' ? ' menu-link_active' : '' ?>">Account
                                Details</a>
                        </li>
                        <li>
                            <a href="<?= $url ?>profile/wishlist"
                                class="menu-link menu-link_us-s<?= $active === 'wishlist' ? ' menu-link_active' : '' ?>">Wishlist</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="menu-link menu-link_us-s"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>

                {{-- - -- end account side bar ----- --}}
                <div class="col-lg-9">

                    @if (count($wishlist) > 0)
                        <div class="page-content my-account__wishlist wish-item">
                            <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid">


                                @foreach ($wishlist as $val)
                                    @php
                                        $img = explode(',', $val->product->image);
                                    @endphp

                                    {{-- ------- WISHLIST PRODUCTS ------------ --}}

                                    <div class="product-card-wrapper  product-data">
                                        <div class="product-card mb-3 mb-md-4 mb-xxl-5 ">

                                            <input type="hidden" class="form-control  qty-value" name="quantity"
                                                value="1">
                                            <input type="hidden" class="product_id" value="{{ $val->product->id }}">

                                            <div class="pc__img-wrapper">
                                                <div class="swiper-container background-img js-swiper-slider"
                                                    data-settings='{"resizeObserver": true}'>
                                                    <div class="swiper-wrapper">

                                                        @foreach ($img as $item)
                                                            <div class="swiper-slide">
                                                                <img loading="lazy"
                                                                    src="{{ asset('image/product/' . $item) }}"
                                                                    width="330" height="400"
                                                                    alt="Cropped Faux leather Jacket" class="pc__img">
                                                            </div><!-- /.pc__img-wrapper -->
                                                        @endforeach


                                                    </div>
                                                    <span class="pc__img-prev">
                                                        <svg width="7" height="11" viewBox="0 0 7 11"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_prev_sm" />
                                                        </svg>
                                                    </span>
                                                    <span class="pc__img-next">
                                                        <svg width="7" height="11" viewBox="0 0 7 11"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_next_sm" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <button class="btn-remove-from-wishlist remove-wishlist">
                                                    <?= $icon_close ?>
                                                </button>
                                            </div>

                                            <div class="pc__info position-relative">
                                                <p class="pc__category">{{ $val->product->category->name }}</p>
                                                <a href="{{ url('category/' . $val->product->category->slug . '/' . $val->product->slug) }}" class="pc__title">{{ $val->product->name }}</a>
                                                <div class="product-card__price d-flex">
                                                    <span class="money price">Rs.{{ $val->product->selling_price }} </span>
                                                </div>

                                                <button
                                                    class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-addToCart"
                                                    title="Add To Cart">
                                                    <?= $icon_cart ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @else
                        {{-- ---- empty favorite ---- --}}
                        <div class="" style="padding: 0px 0 40px">
                            <div class="text-center">
                                <img src="{{ asset('image/empty/emp-3.webp') }}" alt="wishlist-empty" class="img-fluid"
                                    loading="lazy">
                                <h3>Your Lists is <span class="title-hlorg"> Empty!</span></h3>
                                <p class="text-sm text-normal">Look like you have not added anything to you cart. Go ahead &
                                    explore top Collections... </p>
                                <div class="mt-4">
                                    <a href="{{ url('/collections') }}" class="btn-float d-inline-block"> <i
                                            class="fa-solid fa-bag-shopping me-1"></i> Continue Shopping....</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


@endsection
