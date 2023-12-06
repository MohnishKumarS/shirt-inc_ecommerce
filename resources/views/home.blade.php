@extends('layouts.userpage')

@section('title', 'Shirt-inc | Online Shopping for Men & Women Clothing')

@section('content')

    {{-- ------------- carousel ------------------ --}}
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="{{ $slider_active->timer }}">
                <img src="{{ asset('image/slider/' . $slider_active->image) }}" class="img-fluid" alt="slider-poster"
                    loading="lazy">
            </div>
            @foreach ($slider as $item)
                <div class="carousel-item" data-bs-interval="{{ $item->timer }}">
                    <img src="{{ asset('image/slider/' . $item->image) }}" class="img-fluid" alt="slider-poster"
                        loading="lazy">
                </div>
            @endforeach


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- ---------------------------------------------
      ^^^^^^^^^^^^^ ~~ Trending Product list ~~  ^^^^^^^^^^^^^^
         --------------------------------------------- -->
    <section class="trending-list">
        <div class="row mb-5 pb-3">
            <div class="col-12 heading-section text-center">
                <h1 class="big-title">Trending</h1>
                <h2 class="mb-4">our trendings</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">

                {{-- --- -trnding list ---- --}}
                <div class="owl-carousel owl-theme mt-3">
                    @foreach ($trending as $val)
                        @php
                            $img = explode(',', $val->image);
                        @endphp
                        {{-- --- looping a product ---- --}}

                        <div class="item">
                            <!-- -----------  product view  ------------ -->
                            <div class="product-data">
                                <div class="product">
                                    <input type="hidden" class="product_id" value="{{ $val['id'] }}">
                                    <input type="hidden" class="qty-value" value="1">
                                    <div class="product-image">
                                        @if (count($img) > 1)
                                            <a class="image">
                                                <img src="{{ asset('image/product/' . $img[0]) }}" class="pic-1 rotate"
                                                    alt="product-show" loading="lazy">
                                                <img src="{{ asset('image/product/' . $img[1]) }}" class="pic-2 rotate"
                                                    alt="product-show" loading="lazy">
                                            </a>
                                        @else
                                            <a class="image">
                                                <img src="{{ asset('image/product/' . $val->image) }}" class="pic-1"
                                                    alt="product-show" loading="lazy">
                                            </a>
                                        @endif

                                        {{-- ----- offer message ------- --}}
                                        @if ($val->offer_menu)
                                            <span class="discount">{{ $val->offer_msg }}</span>
                                        @endif
                                        <a href="" class="cart addToCart">Add to cart</a>

                                        <ul class="links">
                                            <li><a href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}"><i
                                                        class="fa-solid fa-magnifying-glass"></i></a></li>
                                            <li><a href="" class="addtoWishlist"><i
                                                        class="fa-regular fa-heart"></i></a></li>
                                        </ul>

                                        <div class="content">
                                            <span class="category"><a
                                                    href="{{ url('category/' . $val->category->slug) }}">{{ $val->category->name }}</a></span>
                                            <h3 class="title"><a
                                                    href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}">{{ $val->name }}</a>
                                            </h3>
                                            <div class="price">
                                                <span>Rs {{ $val->original_price }}</span>Rs {{ $val->selling_price }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>



            </div>
        </div>
    </section>

    <!-- ---------------------------------------------
  ^^^^^^^^^^^^^ ~~ category list ~~  ^^^^^^^^^^^^^^
     --------------------------------------------- -->
    <section>
        <div class="row mb-5 pb-3">
            <div class="col-12 heading-section text-center">
                <h1 class="big-title">Category</h1>
                <h2 class="mb-4">our Category</h2>
            </div>
        </div>
        <div class="container">

            <div class="category-list row">
                <div class="owl-carousel owl-theme">
                    @foreach ($category as $val)
                        <div class="item">
                            <div class="card">
                                <div class="imgbox">
                                    <img src="{{ asset('image/category/' . $val->image) }}" alt="category-list"
                                        loading="lazy">
                                </div>
                                <div class="contentbox">
                                    <h3>{{ $val->name }}</h3>
                                    <h2 class="price">Rs 499</h2>
                                    <a href="{{ url('category/' . $val->slug) }}" class="btn-prime">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </section>


    <!-- ---------------------------------------------
     ^^^^^^^^^^^^^ ~~ popular list ~~  ^^^^^^^^^^^^^^
      --------------------------------------------- -->
    @if (count($popular) > 0)

        <section>
            <div class="row mb-5 pb-3">
                <div class="col-12 heading-section text-center">
                    <h1 class="big-title">Popular</h1>
                    <h2 class="mb-4">our popular</h2>
                </div>
            </div>
            <div class="container">

                <div class="popular-list">
                    <div class="products">
                        <h2 class="lg-title">Special T-shirt With Offers</h2>
                        <p class="text-lights">
                            Explore the combination of style and comfort with cool T-shirts in various themes and ...
                            Wrangler
                            Solid Men Round Neck Black T-Shirt ... Offer ends soon.
                        </p>

                        <div class="product-items">

                            <div class="row row-cols-lg-3 row-cols-md-2  gy-4">

                                @foreach ($popular as $val)
                                    @php
                                        $img_pop = explode(',', $val->image);
                                        // echo '<pre>';
                                        // print_r($img)
                                    @endphp
                                    {{-- {{$val}} --}}

                                    <div class="col">
                                        <!-- ------------- view product  list ---------------- -->

                                        <div class="product-data">
                                            <div class="product-content">
                                                <input type="hidden" class="product_id" value="{{ $val['id'] }}">
                                                <input type="hidden" class="qty-value" value="1">
                                                <div class="product-img">
                                                    <img src="{{ asset('image/product/' . $img_pop[0]) }}"
                                                        alt="popular-tees" loading="lazy">
                                                </div>
                                                <div class="product-btns">
                                                    <a href="" class="btn-cart addToCart">
                                                        add to cart <span><i class="fa-solid fa-plus"></i></span>
                                                    </a>
                                                    <a href="" class="btn-buy addtoWishlist">
                                                        add to fav <span><i class="fa-regular fa-heart"></i></span>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-info-top">
                                                        <a class="text-sm"
                                                            href="{{ url('category/' . $val->category->slug) }}">{{ $val->category->name }}</a>
                                                        <div class="rating">
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
                                                        </div>
                                                    </div>
                                                    <a href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}"
                                                        class="text-md">{{ $val->name }}</a>
                                                    <p class="product-price">Rs {{ $val->original_price }}</p>
                                                    <p class="product-price">Rs {{ $val->selling_price }}</p>
                                                </div>
                                                @if ($val->offer_menu)
                                                    <div class="offer-info">
                                                        <h2 class="text-sm">{{ $val->offer_msg }}</h2>
                                                    </div>
                                                @endif
                                                <!-- <div class="offer-info">
                                                      <h2 class="sm-title">24% Off</h2>
                                               </div> -->
                                            </div>
                                        </div>
                                        <!-- -------------end of  view product  list  ---------------- -->
                                    </div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif
    <!-- ---------------------------------------------
      ^^^^^^^^^^^^^ ~~ Unique Collection  ~~  ^^^^^^^^^^^^^^
    --------------------------------------------- -->

    {{-- <section>
        <div class="unique-collection">
            <div>
                <small class="text-sm">new collection</small>
                <h3>Be different in your own way!</h3>
                <h4>Find your unique style.</h4>
                <div class="mt-3">
                    <a href="" class="btn-black">shop collection</a>
                </div>
            </div>
        </div>
    </section> --}}




    <!-- ---------------------------------------------
     ^^^^^^^^^^^^^ ~~ Overall Collection list  ~~  ^^^^^^^^^^^^^^
        --------------------------------------------- -->

    <section>
        <div class="row mb-5 pb-3">
            <div class="col-12 heading-section text-center">
                <h1 class="big-title">collection</h1>
                <h2 class="mb-4">our collection</h2>
            </div>
        </div>
        <div class="overall-collection px-3">
            <div class="row">
                <div class="col-lg-6  row-col-1">
                    <div class="all-col-1 h-100">
                        <div>
                            <h2>Summer Collection</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6  row-col-2">
                    <div class="row h-100">
                        <div class="col-lg-6 col-md-6 h-50">
                            <div class="all-col-2 h-100">
                                <div>
                                    <h2>Men's Collection</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 h-50">
                            <div class="all-col-3 h-100">
                                <div>
                                    <h2>Women's Collection</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 h-50">
                            <div class="all-col-4 h-100">
                                <div>
                                    <h2>Free Shipping</h2>
                                    <h3>On All Orders Above ₹999</h3>
                                    <div>
                                        <a href="{{ url('collections') }}" class="btn-black fw-light">view collection</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- ---------------------------------------------
      ^^^^^^^^^^^^^ ~~ Our Advantage  ~~  ^^^^^^^^^^^^^^
      --------------------------------------------- -->

    <section>
        <div class="our-advantage">
            <div class="container">
                <h2 class="title">Our advantages</h2>
                <div class="row mt-5">
                    <div class="col-lg-3 col-sm-6 mt-4 mt-lg-0 ">
                        <div class="icon">
                            <img width="90" height="90" src="https://img.icons8.com/clouds/100/truck.png"
                                alt="truck" loading="lazy" />
                        </div>
                        <h3>Free shipping <br>from ₹500</h3>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-4 mt-lg-0">
                        <div class="icon">
                            <img width="90" height="90" src="https://img.icons8.com/clouds/100/headset.png"
                                alt="headset" loading="lazy" />
                        </div>
                        <h3>24/7 <br>Help Center</h3>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-4 mt-lg-0">
                        <div class="icon"><img width="90" height="90"
                                src="https://img.icons8.com/bubbles/100/u-turn-to-left.png" alt="u-turn-to-left"
                                loading="lazy" />
                        </div>
                        <h3>Exchange and return <br>within 14 days</h3>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-4 mt-lg-0">
                        <div class="icon"><img width="90" height="90"
                                src="https://img.icons8.com/bubbles/100/discount.png" alt="discount" loading="lazy" />
                        </div>
                        <h3>Discounts for <br>customers</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ---------------------------------------------
     ^^^^^^^^^^^^^ ~~ base collection product ~~  ^^^^^^^^^^^^^^
      --------------------------------------------- -->

    <section>
        <div class="row mb-5 pb-3">
            <div class="col-12 heading-section text-center">
                <h1 class="big-title">Arrival</h1>
                <h2 class="mb-4">new arrival</h2>
            </div>
        </div>
        <div class="container">
            <div class="base-collection">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <div class="base-img text-center">
                                <img src="../image/products/ts/base1.jpg" alt="new-arrival" class="img-fluid"
                                    loading="lazy">
                            </div>
                            <div class="base-content text-center mt-4 mb-4 mb-lg-0">
                                <small class="text-sm">MEN</small>
                                <h3>The base collection - Ideal every day.</h3>
                                <a href="{{ url('new-arrival') }}" class="btn-black">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center">
                            <img src="../image/products/ts/base2.jpg" alt="new-arrival" class="img-fluid"
                                loading="lazy">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>




    <!-- ---------------------------------------------
       ^^^^^^^^^^^^^ ~~ advertise add- offer  ~~  ^^^^^^^^^^^^^^
      --------------------------------------------- -->

    <section>
        <div class="advertise-offer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center">
                        <div class="advertise-content bg-light  p-4 text-center rounded">
                            <img width="100" height="100" src="https://img.icons8.com/clouds/100/discount.png"
                                alt="discount" loading="lazy" />
                            <h2>25% OFF</h2>
                            <h5>On All Orders Above <span class="text-danger">₹1199!</span></h5>
                            <p class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi,
                                tempore.</p>
                            <a href="" class="btn-black">GRAB THIS OFFER</a>

                        </div>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                        <div class="img">
                            <img src="../image/products/bb/ba3.png" alt="offer-products" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ---------------------------------------------
       ^^^^^^^^^^^^^ ~~ subscription user  ~~  ^^^^^^^^^^^^^^
      --------------------------------------------- -->

    <section>
        <div class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-8 col-sm-10">
                        <div class="subscribe-content">
                            <h2>Subscribe</h2>
                            <p>Subscribe us and you won't miss the new arrivals, as well as discounts and sales.</p>
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8">
                                        <input type="text" class="" placeholder="E-mail">
                                    </div>
                                    <div class="col-lg-4 col-md-4 mt-4 mt-md-0">
                                        <button class="btn-blue">SEND</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    @if ($poster)
        <!--Ads Poster Modal -->
        <div class="modal fade" id="popup" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-4" id="exampleModalLabel"> {{ $poster->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <img src="{{ asset('image/Ads-poster/' . $poster->image) }}" class="img-fluid"
                                width="100%" alt="Ads-banner">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <a href="{{ route('signin') }}" class="btn-blue">Login Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection


{{-- -------------- scripts ---------------- --}}

@section('scripts')

    <script>
        // ------------ Ads poster -----------------
        $(document).ready(function() {
            if (sessionStorage.getItem('#popup') != 'true') {

                $('#popup').modal('show');
                sessionStorage.setItem('#popup', true);

            }
        })
        // --------------- pop up ---------------------
        const popup = document.querySelector('.popup');
        const closes = document.querySelector('.close');

        // window.onload = popup_show();

        // function popup_show() {
        //     setTimeout(() => {
        //         popup.style.display = "block";
        //     }, 5000);

        // }

        // closes.addEventListener('click', popup_hide)

        // function popup_hide() {
        //     popup.style.display = "none";
        // }



        // -------------------- loading lazy ------------------

        //     const images =  document.querySelectorAll('img');


        //     let options = {};


        // let observer = new IntersectionObserver((entries,observe)=>{
        //   entries.forEach((entry)=>{
        //     const image = entry.target;
        //     console.log(image);
        //   })


        // }, options);

        // images.forEach(img => {
        //       observer.observe(img)
        //       // console.log(img);
        //     });
    </script>


@endsection
