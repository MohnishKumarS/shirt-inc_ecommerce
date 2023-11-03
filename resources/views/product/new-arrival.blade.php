@extends('layouts.userpage')

@section('title', 'Products')

@section('content')

    <div class="container my-5 p-0">
        <style>
            .poster-img{
                padding: 5px;
                max-height: 250px;
                width: 100%;
                box-shadow: 1px 1px 14px  rgba(0, 0, 0, 0.123);
                border-radius: 10px
            }
            .poster-img img{
                height: inherit;
                width: inherit;
                object-fit: cover;
                border-radius: 10px;
              
            }
        </style>
        {{-- ------- ---- Poster Image ---------  --}}
      @if ($category->poster != null)
      <div class="poster-img mb-4">
        <img src="{{asset('image/category/'.$category->poster)}}" alt="" class="img-fluid">
    </div>
          
      @endif

        <!-- ----------- breadcrumb ------- -->
        <div class="">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">New Arrival</li>

                </ol>
            </nav>
        </div>

        <!-- ---------------------------------------------
                ^^^^^^^^^^^^^ ~~ product  list page ~~  ^^^^^^^^^^^^^^
                 --------------------------------------------- -->

            <div class="new_product-list ">
                <div class="products px-3">
                    <h2 class="lg-title sliding-text">Trendsetting Tees: Shop Our Latest Collection</h2>
                    <p class="text-lights ">
                        Explore the combination of style and comfort with cool T-shirts in various themes and ... Wrangler
                        Solid Men Round Neck Black T-Shirt ... Offer ends soon.
                    </p>

                    <div class="product-items">

                        <div class="row row-cols-lg-3 row-cols-md-2  gx-4 gy-4 my-4">

                            @foreach ($new_product as $val)
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
                                                <img src="{{ asset('image/product/' . $img_pop[0]) }}" alt="product-image" loading="lazy">
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
                                                    <a class="text-sm" href="{{url('category/'.$val->category->slug)}}">{{ $val->category->name }}</a>
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
                                                    <h2 class="text-sm">{{$val->offer_msg}}</h2>
                                                </div>
                                            @endif
                                           
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

@endsection
