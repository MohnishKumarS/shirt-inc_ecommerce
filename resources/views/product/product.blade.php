@extends('layouts.userpage')

@section('title', 'Products')

@section('content')

<section class="full-width_padding">
    <div class="full-width_border border-2" style="border-color: #eeeeee;">
        <div class="shop-banner position-relative ">
            <div class="shop-banner__content container position-absolute start-50 top-50 translate-middle">
                <h2 class="stroke-text h1 smooth-16 text-uppercase fw-bold mb-3 mb-xl-4 mb-xl-5">Free Shipping</h2>
                <ul class="d-flex flex-wrap list-unstyled text-uppercase h6">
                    <li class="me-3 me-xl-4 pe-1"><a href="<?= $url ?>shop" class="menu-link menu-link_us-s menu-link_active">StayHome</a></li>
                    <li class="me-3 me-xl-4 pe-1"><a href="<?= $url ?>shop" class="menu-link menu-link_us-s">New In</a></li>
                    <li class="me-3 me-xl-4 pe-1"><a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Jackets</a></li>
                    <li class="me-3 me-xl-4 pe-1"><a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Hoodies</a></li>
                    <li class="me-3 me-xl-4 pe-1"><a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Men</a></li>
                    <li class="me-3 me-xl-4 pe-1"><a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Women</a></li>
                    <li class="me-3 me-xl-4 pe-1"><a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Trousers</a></li>
                    <li class="me-3 me-xl-4 pe-1"><a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Accessories</a></li>
                    <li class="me-3 me-xl-4 pe-1"><a href="<?= $url ?>shop" class="menu-link menu-link_us-s">Shoes</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="mb-4 pb-lg-3"></div>

<section class="shop-main container">
    <div class="d-flex justify-content-between mb-4 pb-md-2">
        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="{{url('/')}}" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="{{ url('collections') }}" class="menu-link menu-link_us-s text-uppercase fw-medium">Collections</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="javascript:void(0)" class="menu-link menu-link_us-s text-uppercase fw-medium">{{ $category[0]->name }}</a>
        </div>

        <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
            <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0" aria-label="Sort Items" name="total-number">
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

            <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

            <div class="col-size align-items-center order-1 d-none d-lg-flex">
                <span class="text-uppercase fw-medium me-2">View</span>
                <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="2">2</button>
                <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="3">3</button>
                <button class="btn-link fw-medium js-cols-size" data-target="products-grid" data-cols="4">4</button>
            </div><!-- /.col-size -->

            <div class="shop-asc__seprator mx-3 bg-light d-none d-lg-block order-md-1"></div>

            <div class="shop-filter d-flex align-items-center order-0 order-md-3">
                <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside" data-aside="shopFilter">
                    <?= $icon_filter ?> &nbsp;
                    <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
                </button>
            </div>
        </div>
    </div>

    <div class="row" id="">

    {{-- ----------- SIDE BAR FILTERS ----------- --}}
    <div class="col-lg-3 col-md-3 p-0 d-none d-lg-block">
        <div class="pro-sidebar-section border p-2">
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
                        <h6 class="sidebar-head">Gender</h6>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pro_type"
                                    value="mens"
                                    {{ Request::get('pro_type') == 'mens' ? 'checked' : '' }}>
                                <label class="form-check-label sidebar-title">
                                    mens
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pro_type"
                                    value="womens"
                                    {{ Request::get('pro_type') == 'womens' ? 'checked' : '' }}>
                                <label class="form-check-label sidebar-title">
                                    womens
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pro_type"
                                    value="unisex"
                                    {{ Request::get('pro_type') == 'unisex' ? 'checked' : '' }}>
                                <label class="form-check-label sidebar-title">
                                    unisex
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="dash-border-line"></div>
                    <div>
                        <h6 class="sidebar-head">Categories</h6>
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
          <h6 class="sidebar-head">products</h6>
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
                        <h6 class="sidebar-head">price</h6>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sort_price"
                                    value="desc"
                                    {{ Request::get('sort_price') == 'desc' ? 'checked' : '' }}>
                                <label class="form-check-label sidebar-title">
                                    high to low
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sort_price"
                                    value="asc"
                                    {{ Request::get('sort_price') == 'asc' ? 'checked' : '' }}>
                                <label class="form-check-label sidebar-title">
                                    low to high
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="dash-border-line"></div>
                    <div class="my-3">
                        <button class="btn btn-primary w-100" type="submit">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        
    <div class="products-grid row row-cols-1 row-cols-lg-3 row-cols-md-3  row-cols-sm-2 gy-4" id="products-grid">
   
               {{-- ----------   VIEW ALL PRODUCTS TO SHOW ------------- --}}

   @foreach($all_product as $val)
   @php
       $img = explode(',',$val->image)
   @endphp


     <div class="col">
<div class="product-card-wrapper product-data" >
<div class="product-card mb-3 mb-md-4 mb-xxl-5">

   <div class="pc__img-wrapper">
       <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
           <div class="swiper-wrapper">
               <input type="hidden" class="product_id" value="{{ $val['id'] }}">
                <input type="hidden" class="qty-value" value="1">
               @foreach ($img as $item)
               <div class="swiper-slide">
                   <a href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}">
                       <img loading="lazy" src="{{ asset('image/product/' . $item) }}" width="330" height="400" alt="{{$val->name}}" class="pc__img">
                   </a>
               </div>
               @endforeach
             
            
           </div>
           <span class="pc__img-prev">
               <?= $icon_left_chevron ?>
           </span>
           <span class="pc__img-next">
               <?= $icon_right_chevron ?>
           </span>
       </div>
       <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-addToCart"  title="Add To Cart">Add To Cart</button>
   </div>

   <div class="pc__info position-relative">
       <p class="pc__category">{{ $val->category->name }}</p>
       <h6 class="pc__title"><a href="{{ url('category/' . $val->category->slug . '/' . $val->slug) }}">{{ $val->name }}</a></h6>
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

       <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
           <?= $icon_heart; ?>
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
        </div>
        @endforeach
    </div>
    </div>

       

    </div>

        <!-- Paginate -->
        <div class="paginate-pro mt-5 text-center">
            {{ $all_product->links() }}
        </div>

 
</section>

<div class="mb-4 pb-lg-3"></div>

@endsection
