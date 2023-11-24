@extends('layouts.userpage')

@section('title', 'Products')

@section('content')

    <div class="container my-5">
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
      @if ($category[0]->poster != null)
      <div class="poster-img mb-4">
        <img src="{{asset('image/category/'.$category[0]->poster)}}" alt="poster" class="img-fluid" loading="lazy">
    </div>
          
      @endif

        <!-- ----------- breadcrumb ------- -->
        <div class="">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $category[0]->name }}</li>

                </ol>
            </nav>
        </div>

        <!-- ---------------------------------------------
                ^^^^^^^^^^^^^ ~~ product  list page ~~  ^^^^^^^^^^^^^^
                 --------------------------------------------- -->

        <div class="product-view container">
            <div class="row ">
                <div class="col-lg-3 col-md-3 p-0 d-none d-md-block">
                    <div class="pro-sidebar-section">
                        <div class="pro-sidebar">
                            <form action="{{ URL::current() }}" method="get">

                                <div>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="sidebar-head top">Filters</h5>
                                        <div>
                                            <a href="{{ URL::current() }}" class="clear-all">Clear all</a>
                                        </div>
                                    </div>
                                    <div class="dash-border-line mt-2"></div>
                                    <h5 class="sidebar-head">Gender</h5>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pro_type" value="mens"
                                                {{ Request::get('pro_type') == 'mens' ? 'checked' : '' }}>
                                            <label class="form-check-label sidebar-title">
                                                mens
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pro_type" value="womens"
                                                {{ Request::get('pro_type') == 'womens' ? 'checked' : '' }}>
                                            <label class="form-check-label sidebar-title">
                                                womens
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pro_type" value="unisex"
                                                {{ Request::get('pro_type') == 'unisex' ? 'checked' : '' }}>
                                            <label class="form-check-label sidebar-title">
                                                unisex
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash-border-line"></div>
                                <div>
                                    <h5 class="sidebar-head">Categories</h5>
                                    <div>
                                        @foreach ($all_category as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="cat_side"
                                                    value="{{ $item->slug }}"
                                                    {{ Request::get('cat_side') == $item->slug ? 'checked' : '' }}>
                                                <label class="form-check-label sidebar-title">
                                                    {{ $item->name }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                {{-- <div class="dash-border-line"></div>
                      <div>
                          <h5 class="sidebar-head">products</h5>
                          <div>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="">
                                  <label class="form-check-label sidebar-title" >
                                      casual frocks
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="">
                                  <label class="form-check-label sidebar-title" >
                                      Tops
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="">
                                  <label class="form-check-label sidebar-title" >
                                      Jeans
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="">
                                  <label class="form-check-label sidebar-title" >
                                      leggings
                                  </label>
                              </div>
                          </div>
                      </div> --}}
                                <div class="dash-border-line"></div>
                                <div>
                                    <h5 class="sidebar-head">price</h5>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sort_price" value="desc"
                                                {{ Request::get('sort_price') == 'desc' ? 'checked' : '' }}>
                                            <label class="form-check-label sidebar-title">
                                                high to low
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sort_price" value="asc"
                                                {{ Request::get('sort_price') == 'asc' ? 'checked' : '' }}>
                                            <label class="form-check-label sidebar-title">
                                                low to high
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="dash-border-line"></div>
                                <div class="my-3">
                                    <button class="btn-glow" type="submit">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ---------- product view list ---------- -->

                <div class="col-lg-9 col-md-9 ">
                    <div class="products">

                        @if (count($all_product) == 0)
                        <div class="container" >
                            <div class="text-center"> 
                                <img src="{{asset('image/empty/no-product-found.png')}}"  alt="empty-product" loading="lazy">
                                <h3 >Sorry, No Product <span class="title-hlorg"> Found!</span></h3>
                                <p class="text-sm text-normal">Wondering why all of a sudden we are receiving the error message "Sorry, this product or category was not found" </p>
                                <div class="mt-4">
                                    <a href="{{ url('/collections') }}" class="btn-float d-inline-block"> <i
                                        class="fa-solid fa-bag-shopping me-1"></i> Continue Shopping....</a>
                                </div>
                            </div>
                        </div>
                    @else

                        <div class="product-items"> 

                            <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2  row-cols-sm-2 gy-4">

                                @foreach ($all_product as $val)
                                @php
                                    $img = explode(',', $val->image);
                                    // echo '<pre>';
                                    // print_r($img)
                                @endphp

                                    <div class="col">
                                        <!-- -----------another  product view  ------------ -->
                                        <div class="product-data">
                                            <div class="product">
                                                <input type="hidden" class="product_id" value="{{ $val['id'] }}">
                                                <input type="hidden" class="qty-value" value="1">
                                                <div class="product-image">
                                                    @if (count($img) > 1)
                                                        <a class="image">
                                                            <img src="{{ asset('image/product/' . $img[0]) }}"
                                                                class="pic-1 rotate" alt="product-tshirt" loading="lazy">
                                                            <img src="{{ asset('image/product/' . $img[1]) }}"
                                                                class="pic-2 rotate" alt="product-tshirt" loading="lazy">
                                                        </a>
                                                    @else
                                                        <a class="image">
                                                            <img src="{{ asset('image/product/' . $val->image) }}"
                                                                class="pic-1" alt="product-tshirt" loading="lazy">
                                                        </a>
                                                    @endif

                                                    {{-- ------- offer message ------- --}}
                                                    @if ($val->offer_menu)
                                                        <span class="discount">{{ $val->offer_msg }}</span>
                                                    @endif

                                                    <a href="" class="cart addToCart">Add to cart</a>

                                                    <ul class="links">
                                                        <li><a
                                                                href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}"><i
                                                                    class="fa-solid fa-magnifying-glass"></i></a></li>
                                                        <li><a href="" class="addtoWishlist"><i
                                                                    class="fa-regular fa-heart"></i></a></li>
                                                    </ul>

                                                    <div class="content">
                                                        <span class="category"><a
                                                                href="">{{ $val->category->slug }}</a></span>
                                                        <h3 class="title"><a
                                                                href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}">{{ $val->name }}</a>
                                                        </h3>
                                                        <div class="price">
                                                            <span>Rs {{ $val->original_price }}</span>Rs
                                                            {{ $val->selling_price }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                    {{-- <div class="my-5 m-auto">
                                        <div class="alert alert-info h5 text-center" role="alert">
                                            No products found in this collection.
                                        </div>
                                    </div> --}}
                               



                            </div>
                            {{-- ----------- paginate ----------- --}}
                       
                            <div class="paginate-pro mt-5 text-center">
                                {{ $all_product->links() }}
                            </div>

                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
