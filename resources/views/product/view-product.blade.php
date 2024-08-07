@extends('layouts.userpage')

@section('title', 'Products')

@section('content')

    <div class="mb-md-1 pb-md-3"></div>
    <div class="view-single-product">
        @php

             $img = explode(',', $product->image);
            // $freq_img = explode(',', $freq_boug->image);
            //  echo '<pre>';
            //  print_r($img);
        @endphp
        <style>
            .preview-loading-spinner {
                position: absolute;
                top: 0;
                left: 0;
                background-color: #ffffff;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: 1;
            }

            .preview-loading-spinner svg {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            /* ------- product design style  ---- */
            .product-single__designImgs {
                height: 500px;

            }
        </style>

        <section class="product-single container product-data">
            <div class="row">
                <div class="col-lg-7">
                    @if ($product->designType)
                        <div class="product-single__designImgs">
                            <img src="{{ asset('image/design/Tshirt-grey.png') }}" class="typeImg" data-color="grey"
                                data-type="half">
                            <img src="{{ asset('image/design/Tshirt-red.png') }}" class="typeImg" data-color="red"
                                data-type="half">
                            <img src="{{ asset('image/design/Tshirt-black.png') }}" class="typeImg" data-color="black"
                                data-type="half">
                            <img src="{{ asset('image/design/Tshirt-white.png') }}" class="typeImg" data-color="white"
                                data-type="half">
                            <img src="{{ asset('image/design/Tshirt-blue.png') }}" class="typeImg" data-color="blue"
                                data-type="half">
                            <img src="{{ asset('image/design/sweat-grey.png') }}" class="typeImg" data-color="grey"
                                data-type="sleeve">
                            <img src="{{ asset('image/design/sweat-red.png') }}" class="typeImg" data-color="red"
                                data-type="sleeve">
                            <img src="{{ asset('image/design/sweat-black.png') }}" class="typeImg" data-color="black"
                                data-type="sleeve">
                            <img src="{{ asset('image/design/sweat-white.png') }}" class="typeImg" data-color="white"
                                data-type="sleeve">
                            <img src="{{ asset('image/design/sweat-blue.png') }}" class="typeImg" data-color="blue"
                                data-type="sleeve">
                            <img src="{{ asset('image/design/hoodie-grey.png') }}" class="typeImg" data-color="grey"
                                data-type="hoodie">
                            <img src="{{ asset('image/design/hoodie-red.png') }}" class="typeImg" data-color="red"
                                data-type="hoodie">
                            <img src="{{ asset('image/design/hoodie-black.png') }}" class="typeImg" data-color="black"
                                data-type="hoodie">
                            <img src="{{ asset('image/design/hoodie-white.png') }}" class="typeImg" data-color="white"
                                data-type="hoodie">
                            <img src="{{ asset('image/design/hoodie-blue.png') }}" class="typeImg" data-color="blue"
                                data-type="hoodie">
                            <img src="{{ asset('image/product/design/' . $product->design) }}" class="design-image">
                        </div>
                    @else
                        @php
                            // $img = explode(',', $product->image);
                            // $freq_img = explode(',', $freq_boug->image);
                        @endphp
                        <div class="product-single__media" data-media-type="vertical-thumbnail">
                            <div class="product-single__image">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">

                                        @foreach ($img as $val)
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="h-auto"
                                                    src="{{ asset('image/product/' . $val) }}" width="674"
                                                    height="674" alt="{{ $product->slug }}">
                                                {{-- <a data-fancybox="gallery" href="{{ asset('image/product/' . $val) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_zoom" />
                                    </svg>
                                </a> --}}
                                                {{-- @if ($product->design)
                                <img src="{{asset('image/product/design/'.$product->design)}}" class="product-single_img-design" width="360" height="360" alt="{{$product->slug}}" loading="lazy">
                                @endif --}}
                                            </div>
                                        @endforeach


                                    </div>

                                    <div class="swiper-button-prev">
                                        <?= $icon_left_chevron ?>
                                    </div>
                                    <div class="swiper-button-next">
                                        <?= $icon_right_chevron ?>
                                    </div>
                                </div>

                            </div>
                            <div class="product-single__thumbnail">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">

                                        @foreach ($img as $val)
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="h-auto"
                                                    src="{{ asset('image/product/' . $val) }}" width="104"
                                                    height="104" alt="">
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="preview-loading-spinner preview-loading-spinner-centered">
                                <svg version="1.1" id="preview-loading-spinner-1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px"
                                    viewBox="0 0 50 50" style="enable-background: new 0 0 50 50" xml:space="preserve">
                                    <path fill="#000"
                                        d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate"
                                            from="0 25 25" to="360 25 25" dur="0.65s" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-lg-5">
                    <div class="d-flex justify-content-between mb-4 pb-md-2">
                        <div class="breadcrumb mb-0  flex-grow-1">
                            <a href="{{ url('/') }}"
                                class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                            <a href="{{ url('collections') }}"
                                class="menu-link menu-link_us-s text-uppercase fw-medium">Collections</a>
                            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                            <a href="{{ url('category/' . $product->category->slug) }}"
                                class="menu-link menu-link_us-s text-uppercase fw-medium">{{ $product->category->name }}</a>

                        </div><!-- /.breadcrumb -->

                        {{-- <div class="product-single__prev-next d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
                    <a href="#" class="text-uppercase fw-medium">
                        <?= $icon_left_chevron ?>
                        <span class="menu-link menu-link_us-s">Prev</span>
                    </a>
                    <a href="#" class="text-uppercase fw-medium">
                        <span class="menu-link menu-link_us-s">Next</span>
                        <?= $icon_right_chevron ?>
                    </a>
                </div> --}}
                    </div>
                    <h1 class="product-single__name">{{ $product->name }}</h1>
                    <div class="product-single__rating">
                        <div class="reviews-group d-flex">
                            <?= $icon_star ?>
                            <?= $icon_star ?>
                            <?= $icon_star ?>
                            <?= $icon_star ?>
                        </div>
                        <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                    </div>
                    <div class="product-single__price">
                        <span class="current-price">Rs. {{ $product->selling_price }}</span>
                    </div>
                    {{-- <div class="product-single__short-desc">
                <p> {{ $product->desc }} </p>
            </div> --}}
                    {{-- ---colors and design style  --- --}}
                    @if ($product->designType)
                        <div class="mb-3">
                            <div class="product-single__swatches">
                                <div class="product-swatch color-swatches">
                                    <label>Color</label>
                                    <div class="swatch-list">
                                        <input type="radio" name="color" id="swatch-11" value="black" checked>
                                        <label class="swatch swatch-color js-swatch" for="swatch-11" aria-label="Black"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Black"
                                            style="color: #222"></label>
                                        <input type="radio" name="color" id="swatch-12" value="red">
                                        <label class="swatch swatch-color js-swatch" for="swatch-12" aria-label="Red"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Red"
                                            style="color: #C93A3E"></label>
                                        <input type="radio" name="color" id="swatch-13" value="grey">
                                        <label class="swatch swatch-color js-swatch" for="swatch-13" aria-label="Grey"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Grey"
                                            style="color: #E4E4E4"></label>
                                        <input type="radio" name="color" id="swatch-14" value="white">
                                        <label class="swatch swatch-color js-swatch" for="swatch-14" aria-label="White"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="White"
                                            style="color: #faf5f5"></label>
                                        <input type="radio" name="color" id="swatch-15" value="blue">
                                        <label class="swatch swatch-color js-swatch" for="swatch-15" aria-label="blue"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Blue"
                                            style="color: #223cd1"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label>Types</label>
                                    <select class="form-select" id="product-style">
                                        <!-- <option selected>choose type</option> -->
                                        <option value="half" selected>Half Hand</option>
                                        <option value="sleeve">Full sleeve</option>
                                        <option value="hoodie">Hoodie</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div>
                        @php
                            $colors = $product->colors ? json_decode($product->colors) : '';
                            $size = json_decode($product->size_list);
                            $men_size = $product->couple_men_size ? json_decode($product->couple_men_size) : '';
                            $women_size = $product->couple_women_size ? json_decode($product->couple_women_size) : '';
                            // print_r($men_size);
                            // print_r(gettype($men_size))
                        @endphp
                        <label>Sizes</label>
                        @if ($men_size && $women_size)
                            {{-- -------- couples size -------- --}}
                            <div class="row mb-3">
                                <div class="col-6">
                                    <select class="form-select men_size" required>
                                        <option selected value="">Select Men's size</option>
                                        {{-- ---- size get in database --- --}}
                                        @foreach ($men_size as $val)
                                            <option value="{{ $val }}">{{ $val }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="form-select women_size" required>
                                        <option selected value="">Select Women's size</option>
                                        {{-- ---- size get in database --- --}}
                                        @foreach ($women_size as $val)
                                            <option value="{{ $val }}">{{ $val }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="js-size-error text-danger"></div>
                            </div>
                        @else
                            {{-- -------- common size -------- --}}
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-4 col-6">

                                    <select class="form-select com_size" required>
                                        <option selected value="">Choose your size</option>
                                        {{-- ---- size get in database --- --}}
                                        @foreach ($size as $val)
                                            <option value="{{ $val }}">{{ $val }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <div class="js-size-error text-danger"></div>

                                </div>
                            </div>
                        @endif


                    </div>

                    <form name="addtocart-form" method="post">
                        {{-- <div class="product-single__swatches">
                            <div class="product-swatch text-swatches">
                                <label>Sizes</label>
                                <div class="swatch-list">
                                    <input type="radio" name="size" id="swatch-1">
                                    <label class="swatch js-swatch" for="swatch-1" aria-label="Extra Small"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Extra Small">XS</label>
                                    <input type="radio" name="size" id="swatch-2" checked>
                                    <label class="swatch js-swatch" for="swatch-2" aria-label="Small"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Small">S</label>
                                    <input type="radio" name="size" id="swatch-3">
                                    <label class="swatch js-swatch" for="swatch-3" aria-label="Middle"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Middle">M</label>
                                    <input type="radio" name="size" id="swatch-4">
                                    <label class="swatch js-swatch" for="swatch-4" aria-label="Large"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Large">L</label>
                                    <input type="radio" name="size" id="swatch-5">
                                    <label class="swatch js-swatch" for="swatch-5" aria-label="Extra Large"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Extra Large">XL</label>
                                </div>
                                <a href="#" class="sizeguide-link" data-bs-toggle="modal"
                                    data-bs-target="#sizeGuide">Size Guide</a>
                            </div>
                            <div class="product-swatch color-swatches">
                                <label>Color</label>
                                <div class="swatch-list">
                                    <input type="radio" name="color" id="swatch-11">
                                    <label class="swatch swatch-color js-swatch" for="swatch-11" aria-label="Black"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Black"
                                        style="color: #222"></label>
                                    <input type="radio" name="color" id="swatch-12" checked>
                                    <label class="swatch swatch-color js-swatch" for="swatch-12" aria-label="Red"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Red"
                                        style="color: #C93A3E"></label>
                                    <input type="radio" name="color" id="swatch-13">
                                    <label class="swatch swatch-color js-swatch" for="swatch-13" aria-label="Grey"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Grey"
                                        style="color: #E4E4E4"></label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="product-single__addtocart">
                            <input type="hidden" class="product_id" value="{{ $product['id'] }}">
                            <div class="qty-control position-relative">
                                <input type="number" name="quantity" value="1" min="1"
                                    class="qty-control__number qty-value text-center ">
                                <div class="qty-control__reduce change_Qty">-</div>
                                <div class="qty-control__increase change_Qty">+</div>
                            </div><!-- .qty-control -->
                            <button type="submit" class="btn btn-primary btn-addtocart js-addToCart">Add to Cart</button>
                        </div>
                    </form>
                    <div class="product-single__addtolinks">
                        <a href="javascript:void(0)" class="menu-link menu-link_us-s js-add-wishlist"
                            title="Add To Wishlist">
                            <?= $icon_heart ?>
                            <span>Add to Wishlist</span>
                        </a>
                        <share-button class="share-button">
                            <button class=" to-share border-0 bg-transparent d-flex align-items-center">
                                <?= $icon_share ?>
                                {{-- <span>Share</span> --}}
                                <span class="social-m-icon ">
                                    <a href="https://wa.me/send?text={{ urlencode(URL::current()) }}"
                                        class="menu-link menu-link_us-s">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </span>
                                <span class="social-m-icon ">
                                    <a href="" class="menu-link menu-link_us-s">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </span>
                                <span class="social-m-icon ">
                                    <a href="" class="menu-link menu-link_us-s">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                </span>
                            </button>
                            <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                                <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                                <div id="Article-share-template__main"
                                    class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                                    <div class="field grow mr-4">
                                        <label class="field__label sr-only" for="url">Link</label>
                                        <input type="text" class="field__input w-full" id="url"
                                            value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health"
                                            placeholder="Link" onclick="this.select();" readonly="">
                                    </div>
                                    <button class="share-button__copy no-js-hidden">
                                        <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13"
                                            fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                            focusable="false" viewBox="0 0 11 13">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z"
                                                fill="currentColor"></path>
                                        </svg>
                                        <span class="sr-only">Copy link</span>
                                    </button>
                                </div>
                            </details>
                        </share-button>
                        {{-- <script src="./js/details-disclosure.js" defer="defer"></script>
                        <script src="./js/share.js" defer="defer"></script> --}}
                    </div>
                    <div class="product-single__meta-info">
                        <div class="meta-item">
                            <label>size chart:</label>
                            <span>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#sizeChart">
                                    Show
                                </button>
                            </span>
                        </div>
                        <div class="meta-item">
                            <label>Categories:</label>
                            <span>{{ $product->category->name }}</span>
                        </div>
                        <div class="meta-item">
                            <label>Tags:</label>
                            <span>biker, black, bomber, leather</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->


            <!-- sizeChart Modal -->
            <div class="modal fade" id="sizeChart" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fs-5" id="exampleModalLabel">Proper Size and Fit Guide</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <img src="{{ asset('image/common/sizechart.jpg') }}" class="img-fluid"
                                    alt="product-sizechart">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-single__details-tab">
                <ul class="nav nav-tabs" id="myTab1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore active" id="tab-description-tab" data-bs-toggle="tab"
                            href="#tab-description" role="tab" aria-controls="tab-description"
                            aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore" id="tab-additional-info-tab" data-bs-toggle="tab"
                            href="#tab-additional-info" role="tab" aria-controls="tab-additional-info"
                            aria-selected="false">Additional Information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab"
                            href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">Reviews
                            (2)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
                        aria-labelledby="tab-description-tab">
                        <div class="product-single__description">
                            <h3 class="block-title mb-4">Sed do eiusmod tempor incididunt ut labore</h3>
                            <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="block-title">Why choose product?</h3>
                                    <ul class="list text-list">
                                        <li>Creat by cotton fibric with soft and smooth</li>
                                        <li>Simple, Configurable (e.g. size, color, etc.), bundled</li>
                                        <li>Downloadable/Digital Products, Virtual Products</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="block-title">Sample Number List</h3>
                                    <ol class="list text-list">
                                        <li>Create Store-specific attrittbutes on the fly</li>
                                        <li>Simple, Configurable (e.g. size, color, etc.), bundled</li>
                                        <li>Downloadable/Digital Products, Virtual Products</li>
                                    </ol>
                                </div>
                            </div>
                            <h3 class="block-title mb-0">Lining</h3>
                            <p class="content">100% Polyester, Main: 100% Polyester.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-additional-info" role="tabpanel"
                        aria-labelledby="tab-additional-info-tab">
                        <div class="product-single__addtional-info">
                            <div class="item">
                                <label class="h6">Weight</label>
                                <span>1.25 kg</span>
                            </div>
                            <div class="item">
                                <label class="h6">Dimensions</label>
                                <span>90 x 60 x 90 cm</span>
                            </div>
                            <div class="item">
                                <label class="h6">Size</label>
                                <span>XS, S, M, L, XL</span>
                            </div>
                            <div class="item">
                                <label class="h6">Color</label>
                                <span>Black, Orange, White</span>
                            </div>
                            <div class="item">
                                <label class="h6">Storage</label>
                                <span>Relaxed fit shirt-style dress with a rugged</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">
                        <h2 class="product-single__reviews-title">Reviews</h2>
                        <div class="product-single__reviews-list">
                            <div class="product-single__reviews-item">
                                <div class="customer-avatar">
                                    <img loading="lazy" src="../images/avatar.jpg" alt="">
                                </div>
                                <div class="customer-review">
                                    <div class="customer-name">
                                        <h6>Janice Miller</h6>
                                        <div class="reviews-group d-flex">
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="review-date">April 06, 2023</div>
                                    <div class="review-text">
                                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit
                                            quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda
                                            est…</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-single__reviews-item">
                                <div class="customer-avatar">
                                    <img loading="lazy" src="../images/avatar.jpg" alt="">
                                </div>
                                <div class="customer-review">
                                    <div class="customer-name">
                                        <h6>Benjam Porter</h6>
                                        <div class="reviews-group d-flex">
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                            <svg class="review-star" viewBox="0 0 9 9"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_star" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="review-date">April 06, 2023</div>
                                    <div class="review-text">
                                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit
                                            quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda
                                            est…</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-single__review-form">
                            <form name="customer-review-form">
                                <h5>Be the first to review “Message Cotton T-Shirt”</h5>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <div class="select-star-rating">
                                    <label>Your rating *</label>
                                    <span class="star-rating">
                                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                        </svg>
                                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                        </svg>
                                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                        </svg>
                                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                        </svg>
                                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                        </svg>
                                    </span>
                                    <input type="hidden" id="form-input-rating" value="">
                                </div>
                                <div class="mb-4">
                                    <textarea id="form-input-review" class="form-control form-control_gray" placeholder="Your Review" cols="30"
                                        rows="8"></textarea>
                                </div>
                                <div class="form-label-fixed mb-4">
                                    <label for="form-input-name" class="form-label">Name *</label>
                                    <input id="form-input-name" class="form-control form-control-md form-control_gray">
                                </div>
                                <div class="form-label-fixed mb-4">
                                    <label for="form-input-email" class="form-label">Email address *</label>
                                    <input id="form-input-email" class="form-control form-control-md form-control_gray">
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input form-check-input_fill" type="checkbox" value=""
                                        id="remember_checkbox">
                                    <label class="form-check-label" for="remember_checkbox">
                                        Save my name, email, and website in this browser for the next time I comment.
                                    </label>
                                </div>
                                <div class="form-action">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    {{-- ----------- RELATED PRODUCTS ---------------- --}}

    @if (count($related_product) > 0)
        <section class="products-carousel container">
            <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Related <strong>Products</strong></h2>

            <div id="related_products" class="position-relative ">
                <div class="swiper-container js-swiper-slider"
                    data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": false,
            "pagination": {
              "el": "#related_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#related_products .products-carousel__next",
              "prevEl": "#related_products .products-carousel__prev"
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
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
                    <div class="swiper-wrapper">


                        @foreach ($related_product as $item)
                            @php
                                $img = explode(',', $item->image);
                                // ------ discount percentage ------
                                $dis = $item->original_price - $item->selling_price;
                                $dis_count = round(($dis / $item->original_price) * 100);
                            @endphp

                            @auth
                                @php
                                    //    ---------- check wishlist active -----------
                                    $wishactive = App\Models\Wishlist::where('user_id', Auth::user()->id)
                                        ->where('product_id', $item->id)
                                        ->first();
                                @endphp
                            @endauth

                            <div class="swiper-slide product-card product-data" id='pro-set-{{ $item->id }}'>
                                <input type="hidden" class="product_id" value="{{ $item['id'] }}">
                                <input type="hidden" class="qty-value" value="1">
                                <div class="pc__img-wrapper">
                                    <a href="{{ url('category/' . $item->category->slug . '/' . $item->slug) }}">
                                        @if ($item->image != '')
                                            @if (count($img) > 1)
                                                <img loading="lazy" src="{{ asset('image/product/' . $img[0]) }}"
                                                    width="330" height="400" alt="{{ $item->slug }}"
                                                    class="pc__img">
                                                <img loading="lazy" src="{{ asset('image/product/' . $img[1]) }}"
                                                    width="330" height="400" alt="{{ $item->slug }}"
                                                    class="pc__img pc__img-second">
                                            @else
                                                <img loading="lazy" src="{{ asset('image/product/' . $img[0]) }}"
                                                    width="330" height="400" alt="{{ $item->slug }}"
                                                    class="pc__img">
                                            @endif
                                        @else
                                            <img loading="lazy"
                                                src="{{ asset('image/product/design/' . $item->design) }}" width="330"
                                                height="400" alt="{{ $item->slug }}" class="pc__img">
                                        @endif
                                    </a>
                                    <button
                                        class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-addToCart"
                                        title="Add To Cart">Add To Cart</button>
                                </div>

                                <div class="pc__info position-relative">
                                    <p class="pc__category">{{ $item->category->name }}</p>
                                    <h6 class="pc__title"><a
                                            href="{{ url('category/' . $item->category->slug . '/' . $item->slug) }}">
                                            {{ $item->name }}</a></h6>
                                    <div class="product-card__price d-flex">
                                        <span class="money price">Rs.{{ $item->selling_price }}</span>
                                    </div>

                                    <button
                                        class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist @auth @if ($wishactive) wishActive  @endif @endauth"
                                        title="Add To Wishlist">
                                        {!! $icon_heart !!}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div
                    class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
                    <?= $icon_left_chevron ?>
                </div>
                <div
                    class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
                    <?= $icon_right_chevron ?>
                </div>

                <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
            </div>

        </section>
    @endif


    {{-- ----------- POPULAR PRODUCTS ---------------- --}}

    @if (count($popular_product) > 0)
        <section class="products-carousel container">
            <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">POPULAR <strong>Products</strong></h2>

            <div id="popular_products" class="position-relative ">
                <div class="swiper-container js-swiper-slider"
                    data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": false,
            "pagination": {
              "el": "#popular_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#popular_products .products-carousel__next",
              "prevEl": "#popular_products .products-carousel__prev"
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
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
                    <div class="swiper-wrapper">


                        @foreach ($popular_product as $item)
                            @php
                                $img = explode(',', $item->image);
                                // ------ discount percentage ------
                                $dis = $item->original_price - $item->selling_price;
                                $dis_count = round(($dis / $item->original_price) * 100);
                            @endphp


                            @auth
                                @php
                                    //    ---------- check wishlist active -----------
                                    $wishactive = App\Models\Wishlist::where('user_id', Auth::user()->id)
                                        ->where('product_id', $item->id)
                                        ->first();
                                @endphp
                            @endauth

                            <div class="swiper-slide product-card product-data" id='pro-set-{{ $item->id }}'>
                                <input type="hidden" class="product_id" value="{{ $item['id'] }}">
                                <input type="hidden" class="qty-value" value="1">
                                <div class="pc__img-wrapper">
                                    <a href="{{ url('category/' . $item->category->slug . '/' . $item->slug) }}">
                                        @if ($item->image != '')
                                            @if (count($img) > 1)
                                                <img loading="lazy" src="{{ asset('image/product/' . $img[0]) }}"
                                                    width="330" height="400" alt="{{ $item->slug }}"
                                                    class="pc__img">
                                                <img loading="lazy" src="{{ asset('image/product/' . $img[1]) }}"
                                                    width="330" height="400" alt="{{ $item->slug }}"
                                                    class="pc__img pc__img-second">
                                            @else
                                                <img loading="lazy" src="{{ asset('image/product/' . $img[0]) }}"
                                                    width="330" height="400" alt="{{ $item->slug }}"
                                                    class="pc__img">
                                            @endif
                                        @else
                                            <img loading="lazy"
                                                src="{{ asset('image/product/design/' . $item->design) }}" width="330"
                                                height="400" alt="{{ $item->slug }}" class="pc__img">
                                        @endif
                                    </a>
                                    <button
                                        class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-addToCart"
                                        title="Add To Cart">Add To Cart</button>
                                </div>

                                <div class="pc__info position-relative">
                                    <p class="pc__category">{{ $item->category->name }}</p>
                                    <h6 class="pc__title"><a
                                            href="{{ url('category/' . $item->category->slug . '/' . $item->slug) }}">
                                            {{ $item->name }}</a></h6>
                                    <div class="product-card__price d-flex">
                                        <span class="money price">Rs.{{ $item->selling_price }}</span>
                                    </div>

                                    <button
                                        class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist @auth @if ($wishactive) wishActive  @endif @endauth"
                                        title="Add To Wishlist">
                                        {!! $icon_heart !!}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div
                    class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
                    <?= $icon_left_chevron ?>
                </div>
                <div
                    class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
                    <?= $icon_right_chevron ?>
                </div>

                <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
            </div>

        </section>
    @endif


@endsection

@push('scripts')
    <script>

        const spinner = document.querySelector('.preview-loading-spinner');

        if (spinner) {
            window.onload = function() {
                setTimeout(function() {
                    spinner.style.display = 'none';
                }, 700)
            }
        }


        // ------ product design type selection ------
        document.addEventListener('DOMContentLoaded', function() {
            const checkedColor = $('input[name="color"]:checked').val();
            const checkedStyle = $('#product-style').val();
            const productImages = document.querySelectorAll('.product-single__designImgs .typeImg');

            const colorRadios = document.querySelectorAll('input[name="color"]');
            const styleOptions = document.getElementById('product-style');

            // Add change event listener to the select product style 
            if (styleOptions) {
                styleOptions.addEventListener('change', function() {
                    const selectedStyle = styleOptions.value;
                    const selectedColor = $('input[name="color"]:checked').val();
                    checkSetActive(selectedColor, selectedStyle);
                })
            }

            // Add change event listener to each radio button
            colorRadios.forEach((radio) => {
                radio.addEventListener('change', function() {
                    const selectedColor = this.value;
                    const selectedStyle = $('#product-style').val();
                    checkSetActive(selectedColor, selectedStyle);
                })
            });


            checkSetActive(checkedColor, checkedStyle);


            function checkSetActive(color, style) {
                productImages.forEach(function(img) {
                    // Show images with the same color and type, hide others
                    if (img.getAttribute('data-color') === color && img.getAttribute('data-type') ===
                        style) {
                        img.classList.add('active');
                    } else {
                        img.classList.remove('active');
                    }
                })

            }


        });
    </script>
@endpush
