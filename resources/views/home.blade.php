@extends('layouts.userpage')

@section('title', 'Shirt-inc | Online Shopping for Men & Women Clothing')

@section('content')

    {{-- ````````` HOME SLIDER ```````````` --}}
    <!-- ``````````````````````````````````` -->
    <section class="swiper-container js-swiper-slider slideshow full-width_padding swiper-number-pagination"
        data-settings='{
      "autoplay": {
        "delay": 5000
      },
      "slidesPerView": 1,
      "effect": "fade",
      "loop": true
    }'>
        <div class="swiper-wrapper">


            @foreach ($slider as $item)
                <div class="swiper-slide">
                    <div class="overflow-hidden position-relative h-100">
                        <div class="slideshow-bg">
                            <img loading="lazy" src="{{ asset('image/slider/' . $item->image) }}" width="1500" height="400"
                                alt="" class="slideshow-bg__img">
                        </div>
                        <div hidden class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                            <h6
                                class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3 text-white">
                                Couples T-shirt
                            </h6>
                            <h2
                                class="text-uppercase h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5 text-white">
                                Couples T-shirt
                            </h2>
                            <a href="#"
                                class="btn-link btn-link_lg default-underline text-uppercase fw-medium animate animate_fade animate_btt animate_delay-7 text-white">
                                Discover More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="container d-none d-md-block">
            <div
                class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0  position-xxl-right-center">
            </div>
        </div>
    </section>
    <div class="pt-1 pb-5"></div>



    {{-- ````````` CATEGORY SLIDER ```````````` --}}
    <!-- ``````````````````````````````````` -->
    <div class="container mw-1620 bg-white border-radius-10">
        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
        <section class="category-carousel container">
            <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">CATEGORY</h2>

            <div class="position-relative" id="categorySection">
                <div class="swiper-container js-swiper-slider"
                    data-settings='{
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "effect": "none",
                "loop": false,
                "navigation": {
                  "nextEl": "#categorySection .products-carousel__next",
                  "prevEl": "#categorySection .products-carousel__prev"
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 2,
                    "slidesPerGroup": 2,
                    "spaceBetween": 14
                  },
                  "768": {
                    "slidesPerView": 3,
                    "slidesPerGroup": 3,
                    "spaceBetween": 24
                  },
                  "992": {
                    "slidesPerView": 4,
                    "slidesPerGroup": 1,
                    "spaceBetween": 30,
                    "pagination": false
                  },
                  "1200": {
                    "slidesPerView": 4,
                    "slidesPerGroup": 1,
                    "spaceBetween": 60,
                    "pagination": false
                  }
                }
              }'>
                    <div class="swiper-wrapper">

                        @foreach ($category as $item)
                            <div class="swiper-slide">
                                <a href="{{ url('category/' . $item->slug) }}">
                                    <img loading="lazy" class="w-100 h-auto mb-3"
                                        src="{{ asset('image/category/icons/' . $item->icon) }}" width="124"
                                        height="124" alt="category-icons">
                                    {{-- <div class="text-center">
                            <a href="{{ url('category/'.$item->slug) }}" class="menu-link fw-medium">{{$item->name}}</a>
                        </div> --}}
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div
                    class="products-carousel__prev products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/icons/icon_left_chevron.svg') }}" alt="cart Icon">
                </div>
                <div
                    class="products-carousel__next products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/icons/icon_right_chevron.svg') }}" alt="cart Icon">
                </div>
            </div>
        </section>
    </div>
    <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


    {{-- ````````` THEMES SLIDER ```````````` --}}
    <!-- ``````````````````````````````````` -->
    <div class="container mw-1620 bg-white border-radius-10">
        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
        <section class="category-carousel container">
            <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">THEMES</h2>

            <div class="position-relative" id='themeSection'>
                <div class="swiper-container js-swiper-slider"
                    data-settings='{
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "effect": "none",
                "loop": false,
                "navigation": {
                  "nextEl": "#themeSection .products-carousel__next-1",
                  "prevEl": "#themeSection .products-carousel__prev-1"
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 2,
                    "slidesPerGroup": 2,
                    "spaceBetween": 14
                  },
                  "768": {
                    "slidesPerView": 3,
                    "slidesPerGroup": 3,
                    "spaceBetween": 24
                  },
                  "992": {
                    "slidesPerView": 4,
                    "slidesPerGroup": 1,
                    "spaceBetween": 30,
                    "pagination": false
                  },
                  "1200": {
                    "slidesPerView": 4,
                    "slidesPerGroup": 1,
                    "spaceBetween": 60,
                    "pagination": false
                  }
                }
              }'>
                    <div class="swiper-wrapper">

                        @foreach ($theme as $item)
                            <div class="swiper-slide">
                                <a href="{{ url('themes/' . $item->slug) }}">
                                    <img loading="lazy" class="w-100 h-auto mb-3"
                                        src="{{ asset('image/themes/icon/' . $item->icon) }}" width="124" height="124"
                                        alt="category-list">
                                    {{-- <div class="text-center">
                            <a href="{{ url('themes/'.$item->slug) }}" class="menu-link fw-medium">{{$item->name}}</a>
                        </div> --}}
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div
                    class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/icons/icon_left_chevron.svg') }}" alt="cart Icon">
                </div>
                <div
                    class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/icons/icon_right_chevron.svg') }}" alt="cart Icon">
                </div>
            </div>
        </section>
    </div>
    <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>





    {{-- ````````` CATEGORY BANNER ```````````` --}}
    <!-- ``````````````````````````````````` -->
    {{-- <section class="grid-banner container mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="grid-banner__item grid-banner__item_rect grid-banner__item_rect_3 position-relative">
                    <div class="background-img"
                        style="background-image: url('<?= $url ?>assets/images/mocks/women-banner.webp');"></div>
                    <div class="content_abs content_right d-flex flex-column justify-content-center h-100">
                        <h3 class="text-uppercase text-white fs-35 fw-bold mb-3">Women's<br>Collections</h3>
                        <p class="mb-0">
                            <a href="#"
                                class="btn-link default-underline text-uppercase text-white fw-bold fs-base w-auto">Shop
                                Now</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 pt-2">
                <div class="grid-banner__item grid-banner__item_rect grid-banner__item_rect_3 position-relative">
                    <div class="background-img"
                        style="background-image: url('<?= $url ?>assets/images/mocks/men-banner.webp');"></div>
                    <div class="content_abs content_right d-flex flex-column justify-content-center h-100">
                        <h3 class="text-uppercase text-white fs-35 fw-bold mb-3">Men's<br>Collections</h3>
                        <p class="mb-0">
                            <a href="#"
                                class="btn-link default-underline text-uppercase text-white fw-bold fs-base w-auto">Shop
                                Now</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 pt-2">
                <div class="grid-banner__item grid-banner__item_rect grid-banner__item_rect_3 position-relative">
                    <div class="background-img"
                        style="background-image: url('<?= $url ?>assets/images/mocks/kids-banner.webp');"></div>
                    <div class="content_abs content_left d-flex flex-column justify-content-center h-100">
                        <h3 class="text-uppercase text-white fs-35 fw-bold mb-3">Kid's<br>Collections</h3>
                        <p class="mb-0">
                            <a href="#"
                                class="btn-link default-underline text-uppercase text-white fw-bold fs-base w-auto">Shop
                                Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mb-4 mb-xl-5 pt-1 pb-5"></div> --}}





    {{-- ````````` POPULAR PRODUCT ```````````` --}}
    <!-- ``````````````````````````````````` -->
    @if ($popular->count() > 3)
        @php
            $pop_img1 = explode(',', $popular[0]->image)[0] ?: 'default.png';
            $pop_img2 = explode(',', $popular[1]->image)[0] ?: 'default.png';
            $pop_img3 = explode(',', $popular[2]->image)[0] ?: 'default.png';
            $pop_img4 = explode(',', $popular[3]->image)[0] ?: 'default.png';

        @endphp
        <section class="category-masonry container">
            <div class="row">
                <div class="col-lg-6 px-4">
                    <div class="category-masonry__item">
                        <h2 class="category-masonry__title fw-normal mb-0">New Season<br>and New Trends</h2>
                    </div>
                    <div class="pb-4 mb-4 pb-xl-5 mb-xl-5"></div>
                    <div class="category-masonry__item">
                        <div class="category-masonry__item-image pb-1 mb-4">
                            <img loading="lazy" class="h-auto" src="{{ asset('image/product/' . $pop_img1) }}" width="570"
                                height="500" alt="popular-products">
                        </div>
                        <h2>Men’s Collection</h2>
                        <a href="{{url('category/'.$popular[0]->category->slug.'/'.$popular[0]->slug)}}" class="btn-link btn-link_md default-underline text-uppercase fw-medium">
                            Discover Now
                        </a>
                        <div class="category-masonry__item-category fw-medium">MEN LOOKBOOK</div>
                    </div>
                    <div class="py-4 my-4 py-xl-5 my-xl-5"></div>
                    <div class="category-masonry__item">
                        <div class="category-masonry__item-image pb-1 mb-4">
                            <img loading="lazy" class="h-auto" src="{{ asset('image/product/' . $pop_img2) }}" width="672"
                                height="480" alt="popular-products">
                        </div>
                        <h2>Newest Unisex Clothes</h2>
                        <a href="{{url('category/'.$popular[0]->category->slug.'/'.$popular[1]->slug)}}" class="btn-link btn-link_md default-underline text-uppercase fw-medium">Discover
                            Now</a>
                        <div class="category-masonry__item-category fw-medium">NEW ARRIVAL</div>
                    </div>
                    <div class="py-4 my-4 py-xl-5 my-xl-5"></div>
                    {{-- <div class="category-masonry__item">
                 <div class="category-masonry__item-image pb-1 mb-4">
                     <img loading="lazy" class="h-auto" src="<?= $url ?>assets/images/mocks/slider/mock2.jpg"
                         width="570" height="570" alt="popular-products">
                 </div>
                 <h2>Slouchy Colorblock Tunic Sweater</h2>
                 <a href="#" class="btn-link btn-link_md default-underline text-uppercase fw-medium">Discover
                     Now</a>
                 <div class="category-masonry__item-category fw-medium">SWEATSHIRT</div>
             </div>
             <div class="py-4 my-4 py-xl-5 my-xl-5"></div>
             <div class="category-masonry__item">
                 <div class="category-masonry__item-image pb-1 mb-4">
                     <img loading="lazy" class="h-auto" src="<?= $url ?>assets/images/mocks/slider/mock1.webp"
                         width="450" height="550" alt="popular-products">
                 </div>
                 <h2>Jackets & Coats</h2>
                 <a href="#" class="btn-link btn-link_md default-underline text-uppercase fw-medium">Discover
                     Now</a>
                 <div class="category-masonry__item-category fw-medium">BE WELL DRESSED IN</div>
             </div>
             <div class="py-4 my-4 py-xl-5 my-xl-5"></div> --}}
                </div>
                <div class="col-lg-6 px-4 d-lg-flex flex-lg-column align-items-lg-end">
                    <div class="category-masonry__item">
                        <div class="category-masonry__item-image pb-1 mb-4">
                            <img loading="lazy" class="h-auto" src="{{ asset('image/product/' . $pop_img3) }}"
                                width="570" height="631" alt="popular-products">
                        </div>
                        <h2>Men’s Spring Collection 2020</h2>
                        <a href="{{url('category/'.$popular[0]->category->slug.'/'.$popular[2]->slug)}}"
                            class="btn-link btn-link_md default-underline text-uppercase fw-medium">
                            Discover Now
                        </a>
                        <div class="category-masonry__item-category fw-medium">MEN COLLECTION</div>
                    </div>
                    <div class="py-4 my-4 py-xl-5 my-xl-5"></div>
                    <div class="category-masonry__item">
                        <div class="category-masonry__item-image pb-1 mb-4">
                            <img loading="lazy" class="h-auto" src="{{ asset('image/product/' . $pop_img4) }}"
                                width="450" height="550" alt="popular-products">
                        </div>
                        <h2>Fresh Dresses</h2>
                        <a href="{{url('category/'.$popular[0]->category->slug.'/'.$popular[3]->slug)}}"
                            class="btn-link btn-link_md default-underline text-uppercase fw-medium">Discover
                            Now</a>
                        <div class="category-masonry__item-category fw-medium">DRESSES</div>
                    </div>
                    <div class="py-4 my-4 py-xl-5 my-xl-5"></div>
                    {{-- <div class="category-masonry__item">
                 <div class="category-masonry__item-image pb-1 mb-4">
                     <img loading="lazy" class="h-auto" src="<?= $url ?>assets/images/mocks/slider/mock5.png"
                         width="570" height="450" alt="popular-products">
                 </div>
                 <h2>Shirt in Vintage Plaid</h2>
                 <a href="#" class="btn-link btn-link_md default-underline text-uppercase fw-medium">Discover
                     Now</a>
                 <div class="category-masonry__item-category fw-medium">FIND YOUR FIT</div>
             </div>
             <div class="py-4 my-4 py-xl-5 my-xl-5"></div>
             <div class="pb-0 mb-0 pb-xl-5 mb-xl-5 pt-0 mt-0 pt-xl-5 mt-xl-4"></div>
             <div class="category-masonry__item">
                 <div class="category-masonry__item-image pb-1 mb-4">
                     <img loading="lazy" class="h-auto" src="<?= $url ?>assets/images/mocks/slider/mock3.png"
                         width="450" height="450" alt="popular-products">
                 </div>
                 <h2>Sleeve Bags</h2>
                 <a href="#" class="btn-link btn-link_md default-underline text-uppercase fw-medium">Discover
                     Now</a>
                 <div class="category-masonry__item-category fw-medium">ACCESSORIES</div>
             </div>
             <div class="py-4 my-4 py-xl-5 my-xl-5"></div> --}}
                </div>
            </div>
        </section>
    @endif




    {{-- ````````` TRENDING PRODUCT ```````````` --}}
    <!-- ``````````````````````````````````` -->

    @if (count($trending) > 0)
        <section class="latest-products  container">
            <h2 class="section-title text-uppercase fw-bold text-center mb-4 pb-xl-2 mb-xl-4">TRENDING Products</h2>

            <div class="position-relative">
                <div class="swiper-container js-swiper-slider"
                    data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 4,
              "slidesPerGroup": 4,
              "effect": "none",
              "loop": false,
              "scrollbar": {
                "el": ".latest-products .products-carousel__scrollbar",
                "draggable": true
              },
              "navigation": {
                "nextEl": ".latest-products .products-carousel__next",
                "prevEl": ".latest-products .products-carousel__prev"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 14
                },
                "768": {
                  "slidesPerView": 3,
                  "slidesPerGroup": 3,
                  "spaceBetween": 24
                },
                "992": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 1,
                  "spaceBetween": 30,
                  "pagination": false
                }
              }
            }'>
                    <div class="swiper-wrapper">

                        @foreach ($trending as $val)
                            @php
                                $img = explode(',', $val->image);

                            @endphp
                            @auth
                                @php
                                    //    ---------- check wishlist active -----------
                                    $wishactive = App\Models\Wishlist::where('user_id', Auth::user()->id)
                                        ->where('product_id', $val->id)
                                        ->first();
                                @endphp
                            @endauth

                            {{-- --- loop a trending products --- --}}

                            <div class="swiper-slide product-card product-data" id='pro-set-{{ $val->id }}'>
                                <input type="hidden" class="product_id" value="{{ $val['id'] }}">
                                <input type="hidden" class="qty-value" value="1">
                                <div class="pc__img-wrapper">
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
                                            <img loading="lazy" src="{{ asset('image/product/design/' . $val->design) }}"
                                                width="330" height="400" alt="{{ $val->slug }}"
                                                class="pc__img">
                                        @endif

                                    </a>
                                    <div
                                        class="anim_appear-bottom position-absolute bottom-0 start-0 w-100 d-none d-sm-flex align-items-center">
                                        <button
                                            class="btn btn-primary flex-grow-1 fs-base ps-3 ps-xxl-4 pe-0 border-0 text-uppercase fw-medium js-addToCart"
                                            title="Add To Cart">Add To Cart</button>
                                        <a href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}"
                                            class="btn btn-primary flex-grow-1 fs-base ps-0 pe-3 pe-xxl-4 border-0 text-uppercase fw-medium js-quick-view"
                                            title="Quick view">Quick View</a>
                                    </div>
                                    <button
                                        class="pc__btn-wl position-absolute bg-body rounded-circle border-0 text-primary js-add-wishlist @auth @if ($wishactive) wishActive  @endif @endauth "
                                        title="Add To Wishlist">
                                        {!! $icon_heart !!}
                                        {{-- <img src="{{ asset("assets/icons/icon_heart.svg") }}" alt="heart Icon"> --}}
                                    </button>
                                </div>

                                <div class="pc__info position-relative">
                                    <p class="pc__category third-color">{{ $val->category->name }}</p>
                                    <h6 class="pc__title"><a
                                            href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}">{{ $val->name }}</a>
                                    </h6>
                                    <div class="product-card__price d-flex">
                                        <span class="money price">Rs.{{ $val->selling_price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                {{-- <div
                    class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/icons/icon_left_chevron.svg') }}" alt="cart Icon">
                </div>
                <div
                    class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/icons/icon_right_chevron.svg') }}" alt="cart Icon">
                </div> --}}

                <div class="pb-2 mb-2 mb-xl-4"></div>

                <div class="products-carousel__scrollbar swiper-scrollbar"></div>
            </div>

        </section>

        <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>
    @endif



    {{-- ````````` OFFER CARDS ```````````` --}}
    <!-- ``````````````````````````````````` -->
    @include ('blocks.offers-cards')
    <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>




    {{-- ````````` DESIGN PRODUCT ```````````` --}}
    <!-- ``````````````````````````````````` -->

    @if (count($design) > 0)

        <section class="designed-products container">
            <h2 class="section-title text-uppercase fw-bold text-center mb-4 pb-xl-2 mb-xl-4">Designed Products</h2>

            <div class="position-relative">
                <div class="swiper-container js-swiper-slider"
                    data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 4,
              "slidesPerGroup": 4,
              "effect": "none",
              "loop": false,
              "scrollbar": {
                "el": ".designed-products .products-carousel__scrollbar",
                "draggable": true
              },
              "navigation": {
                "nextEl": ".designed-products .products-carousel__next",
                "prevEl": ".designed-products .products-carousel__prev"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 14
                },
                "768": {
                  "slidesPerView": 3,
                  "slidesPerGroup": 3,
                  "spaceBetween": 24
                },
                "992": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 1,
                  "spaceBetween": 30,
                  "pagination": false
                }
              }
            }'>
                    <div class="swiper-wrapper">

                        @foreach ($design as $val)
                            @php
                                $img = explode(',', $val->image);

                            @endphp
                            @auth
                                @php
                                    //    ---------- check wishlist active -----------
                                    $wishactive = App\Models\Wishlist::where('user_id', Auth::user()->id)
                                        ->where('product_id', $val->id)
                                        ->first();
                                @endphp
                            @endauth

                            {{-- --- loop a trending products --- --}}

                            <div class="swiper-slide product-card product-data" id='pro-set-{{ $val->id }}'>
                                <input type="hidden" class="product_id" value="{{ $val['id'] }}">
                                <input type="hidden" class="qty-value" value="1">
                                <div class="pc__img-wrapper">
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
                                            <img loading="lazy" src="{{ asset('image/product/design/' . $val->design) }}"
                                                width="330" height="400" alt="{{ $val->slug }}"
                                                class="pc__img">
                                        @endif

                                    </a>
                                    <div
                                        class="anim_appear-bottom position-absolute bottom-0 start-0 w-100 d-none d-sm-flex align-items-center">
                                        <button
                                            class="btn btn-primary flex-grow-1 fs-base ps-3 ps-xxl-4 pe-0 border-0 text-uppercase fw-medium js-addToCart"
                                            title="Add To Cart">Add To Cart</button>
                                        <a href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}"
                                            class="btn btn-primary flex-grow-1 fs-base ps-0 pe-3 pe-xxl-4 border-0 text-uppercase fw-medium js-quick-view"
                                            title="Quick view">Quick View</a>
                                    </div>
                                    <button
                                        class="pc__btn-wl position-absolute bg-body rounded-circle border-0 text-primary js-add-wishlist @auth @if ($wishactive) wishActive  @endif @endauth "
                                        title="Add To Wishlist">
                                        {!! $icon_heart !!}
                                        {{-- <img src="{{ asset("assets/icons/icon_heart.svg") }}" alt="heart Icon"> --}}
                                    </button>
                                </div>

                                <div class="pc__info position-relative">
                                    <p class="pc__category third-color">{{ $val->category->name }}</p>
                                    <h6 class="pc__title"><a
                                            href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}">{{ $val->name }}</a>
                                    </h6>
                                    <div class="product-card__price d-flex">
                                        <span class="money price">Rs.{{ $val->selling_price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div
                    class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/icons/icon_left_chevron.svg') }}" alt="cart Icon">
                </div>
                <div
                    class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/icons/icon_right_chevron.svg') }}" alt="cart Icon">
                </div>

                <div class="pb-2 mb-2 mb-xl-4"></div>

                {{-- <div class="products-carousel__scrollbar swiper-scrollbar"></div> --}}
            </div>

        </section>

        <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>

    @endif

    {{-- ````````` SERVICE BLOCK ```````````` --}}
    <!-- ``````````````````````````````````` -->
    @include ('blocks.services-block')


@endsection
