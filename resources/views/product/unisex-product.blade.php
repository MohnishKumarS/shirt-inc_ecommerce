@extends('layouts.userpage')

@section('title', 'unisex Products')

@section('content')

    <section class="full-width_padding">
        <div class="full-width_border border-2" style="border-color: #eeeeee;">
            <div class="shop-banner position-relative ">
                <div class="shop-banner__content container position-absolute start-50 top-50 translate-middle">
                    <h2 class="stroke-text h1 smooth-16 text-uppercase fw-bold mb-3 mb-xl-4 mb-xl-5">Neutral collections</h2>
                    @if ($themes->count() > 0)
                        <ul class="d-flex flex-wrap list-unstyled text-uppercase h6">
                            @foreach ($themes as $item)
                                <li class="me-3 me-xl-4 pe-1"><a href="{{ url('themes/' . $item->slug) }}"
                                        class="menu-link menu-link_us-s">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="mb-4 pb-lg-3"></div>

    <section class="shop-main container">
        <div class="d-flex justify-content-between mb-4 pb-md-2">
            <div class="breadcrumb mb-0  flex-grow-1">
                <a href="{{ url('/') }}" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                <a href="{{ url('collections') }}" class="menu-link menu-link_us-s text-uppercase fw-medium">Collections</a>
                <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                <a href="javascript:void(0)" class="menu-link menu-link_us-s text-uppercase fw-medium">new arrival</a>
            </div>

            <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
                {{-- <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0" aria-label="Sort Items" name="total-number">
                <option selected>Default Sorting</option>
                <option value="1">Featured</option>
                <option value="2">Best selling</option>
                <option value="3">Alphabetically, A-Z</option>
                <option value="3">Alphabetically, Z-A</option>
                <option value="3">Price, low to high</option>
                <option value="3">Price, high to low</option>
                <option value="3">Date, old to new</option>
                <option value="3">Date, new to old</option>
            </select>

            <div class="shop-asc__seprator mx-3 bg-light  order-md-0"></div> --}}

                <div class="col-size align-items-center order-1 d-none d-lg-flex">
                    <span class="text-uppercase fw-medium me-2">View</span>
                    <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                        data-cols="2">2</button>
                    <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                        data-cols="3">3</button>
                    <button class="btn-link fw-medium js-cols-size" data-target="products-grid" data-cols="4">4</button>
                </div><!-- /.col-size -->

                {{-- <div class="shop-asc__seprator mx-3 bg-light d-none d-lg-block order-md-1"></div>

            <div class="shop-filter d-flex align-items-center order-0 order-md-3">
                <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside" data-aside="shopFilter">
                    <?= $icon_filter ?> &nbsp;
                    <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
                </button>
            </div> --}}
            </div>
        </div>

        @if (count($unisex_collect) > 0)
            <div class="products-grid row row-cols-2 row-cols-md-3 row-cols-lg-4" id="products-grid">

                @foreach ($unisex_collect as $val)
                    @php
                        $img = explode(',', $val->image);
                    @endphp
                    @auth
                        @php
                            //    ---------- check wishlist active or not -----------
                            $wishactive = App\Models\Wishlist::where('user_id', Auth::user()->id)
                                ->where('product_id', $val->id)
                                ->first();
                        @endphp
                    @endauth

                    {{-- ---------- UNISEX PRODUCTS TO SHOW ------------- --}}

                    <div class="product-card-wrapper product-data" id='pro-set-{{ $val->id }}'>
                        <div class="product-card mb-3 mb-md-4 mb-xxl-5">

                            <div class="pc__img-wrapper">
                                <div class="swiper-container background-img js-swiper-slider"
                                    data-settings='{"resizeObserver": true}'>
                                    <div class="swiper-wrapper">
                                        <input type="hidden" class="product_id" value="{{ $val['id'] }}">
                                        <input type="hidden" class="qty-value" value="1">

                                        <div class="swiper-slide">
                                            <a href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}">
                                                @if ($val->image != '')
                                                    @if (count($img) > 1)
                                                        <img loading="lazy" src="{{ asset('image/product/' . $img[0]) }}"
                                                            width="330" height="400" alt="{{ $val->slug }}"
                                                            class="pc__img">
                                                        <img loading="lazy" src="{{ asset('image/product/' . $img[1]) }}"
                                                            width="330" height="400" alt="{{ $val->slug }}"
                                                            class="pc__img pc__img-second">
                                                    @else
                                                        <img loading="lazy" src="{{ asset('image/product/' . $img[0]) }}"
                                                            width="330" height="400" alt="{{ $val->slug }}"
                                                            class="pc__img">
                                                    @endif
                                                @else
                                                    <img loading="lazy"
                                                        src="{{ asset('image/product/design/' . $val->design) }}"
                                                        width="330" height="400" alt="{{ $val->slug }}"
                                                        class="pc__img">
                                                @endif
                                            </a>
                                        </div>


                                    </div>
                                    <span class="pc__img-prev">
                                        <?= $icon_left_chevron ?>
                                    </span>
                                    <span class="pc__img-next">
                                        <?= $icon_right_chevron ?>
                                    </span>
                                </div>
                                <button
                                    class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-addToCart"
                                    title="Add To Cart">Add To Cart</button>
                            </div>

                            <div class="pc__info position-relative">
                                <p class="pc__category">{{ $val->category->name }}</p>
                                <h6 class="pc__title"><a
                                        href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}">{{ $val->name }}</a>
                                </h6>
                                <div class="product-card__price d-flex">
                                    <span class="money price">Rs. {{ $val->selling_price }}</span>
                                </div>
                                {{-- <div class="d-flex align-items-center mt-1">
                    <a href="#" class="swatch-color pc__swatch-color" style="color: #222222"></a>
                    <a href="#" class="swatch-color swatch_active pc__swatch-color" style="color: #b9a16b"></a>
                    <a href="#" class="swatch-color pc__swatch-color" style="color: #f5e6e0"></a>
                </div>
               <div class="product-card__review d-flex align-items-center">
                    <div class="reviews-group d-flex">
                        <?= $icon_star ?>
                        <?= $icon_star ?>
                        <?= $icon_star ?>
                    </div>
                    <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                </div>  --}}

                                <button
                                    class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist 
                @auth @if ($wishactive) wishActive  @endif @endauth"
                                    title="Add To Wishlist">
                                    <?= $icon_heart ?>
                                </button>
                            </div>

                            <div class="pc-labels position-absolute top-0 start-0 w-100 d-flex justify-content-between">
                                <div class="pc-labels__left">
                                    <span class="pc-label pc-label_new d-block bg-white">NEW</span>
                                </div>

                                <div class="pc-labels__right">
                                    <span class="pc-label pc-label_sale d-block text-white">-67%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Paginate -->
            <div class="paginate-pro mt-5 text-center">
                {{ $unisex_collect->links() }}
            </div>
        @else
            {{-- --- if no product in array list shows empty image --  --}}
            <div class="container mb-5">
                <div class="text-center">
                    <img src="{{ asset('image/empty/no-product-found.png') }}" alt="empty-product" loading="lazy">
                    <h3>Sorry, No Product <span class="title-hlorg"> Found!</span></h3>
                    <p class="text-sm text-normal">Wondering why all of a sudden we are receiving the
                        error message "Sorry, this product or category was not found" </p>
                    <div class="mt-4">
                        <a href="{{ url('/collections') }}" class="btn btn-primary"> <i
                                class="fa-solid fa-bag-shopping me-1"></i> Continue Shopping....</a>
                    </div>
                </div>
            </div>

        @endif




    </section>

    <div class="mb-4 pb-lg-3"></div>

@endsection
