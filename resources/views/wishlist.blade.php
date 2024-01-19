@extends('layouts.userpage')

@section('title', 'My wishlist')

@section('content')

    <section class="min-vh-75">
        <div class="container wish-item py-5 ">
            <div class="card " >
                <div class="card-header shadow">
                    <h3>FAVOURITE <i class="fa-solid fa-hand-holding-heart ms-1 fs-4"></i></h3>
                </div>
                <div class="card-body">

                    @if ($wishlist->count() > 0)

                        <div class="wishlist-section">


                            {{-- --- wishlist item ---- --}}

                            <style>
                                .cart-img {
                                    height: 220px;
                                    width: 100%
                                }

                                .cart-img img {
                                    height: inherit;
                                    width: 100%;
                                    object-fit: contain;
                                }
                            </style>

                            @php
                                $i = 0;
                            @endphp
                            @foreach ($wishlist as $val)
                                @php
                                    $img = explode(',', $val->product->image);

                                    // ------ discount percentage ------

                                    //     $discount = $val->product->original_price - $val->product->selling_price;
                                    //   $dis_count = round(($discount / $val->product->original_price) * 100);

                                @endphp
                                <div class="product-data py-5">
                                    <input type="hidden" class="form-control  qty-value" name="quantity" value="1">
                                    <input type="hidden" class="product_id" value="{{ $val->product->id }}">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="cart-img">
                                                <img src="{{ asset('image/product/' . $img[0]) }}" alt="product-show"
                                                    loading="lazy">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="text-center text-lg-start mt-3 mt-lg-0">
                                                <h5 class=""><a class="title-hover"
                                                        href="{{ url('category/' . $cat[$i]->slug . '/' . $val->product->slug) }}">{{ $val->product->name }}</a>
                                                </h5>
                                                <h6><a href="{{ url('category/' . $cat[$i]->slug) }}"
                                                        class="text-sm title-hover1">{{ $cat[$i]->name }}</a></h6>
                                                <h4 class="mt-2">₹ {{ $val->product->selling_price }} <span
                                                        class="text-secondary ms-2 fs-6"><s>₹{{ $val->product->original_price }}</s></span>
                                                    {{-- <span class="text-success ms-1 fs-6">({{ $dis_count }}% off)</span> --}}
                                                </h4>
                                                <div>
                                                    @if ($val->product->quantity > 0)
                                                        <label for="" class="badge bg-success">In stock</label>
                                                    @else
                                                        <label for="" class="badge bg-danger">Out of stock</label>
                                                    @endif
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn-glow addToCart"><i
                                                            class="bi bi-cart-fill me-2"></i>Add to Cart</button>
                                                    <button class="btn-blue btn-remove remove-wishlist ms-3"><i
                                                            class="fa-solid fa-trash-can "></i> </button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @php
                                    $i++;
                                @endphp
                                <hr>
                            @endforeach

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
        </div>
    </section>

@endsection
