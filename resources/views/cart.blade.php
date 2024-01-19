@extends('layouts.userpage')

@section('title', 'My Cart')

@section('content')

    <section class="min-vh-75">
        <div class="container  cart-item py-5">
            <div class="card cart">
                <div class="card-header shadow">
                    <h3>Shopping Cart <span><i class="fa-solid fa-cart-shopping fs-4 "></i></span></h3>
                </div>
                <section class="inr" hidden>

                </section>
                <div class="card-body">

                    @if (count($cart) == 0)
                        <div class="" style="padding: 60px 0 100px 0">
                            <div class="text-center">
                                <img src="{{ asset('image/empty/cart-empty.png') }}" alt="cart-empty" class="img-fluid"
                                    loading="lazy">
                                <h3>Your Cart is <span class="title-hlorg"> Empty!</span></h3>
                                <p class="text-sm text-normal">Look like you have not added anything to you cart. Go ahead &
                                    explore
                                    top Collections... </p>
                                <div class="mt-4">
                                    <a href="{{ url('/collections') }}" class="btn-float d-inline-block"> <i
                                            class="fa-solid fa-bag-shopping me-1"></i> Continue Shopping....</a>
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- ------ timeline ----- --}}
                        <div class="cart-timeline mt-3">
                            <div class="row px-5">
                                <div class="col">
                                    <div class="cart-bag text-center">
                                        <div class="icon-image">
                                            <img class="active"
                                                src="https://img.icons8.com/clouds/100/shopping-basket-success.png"
                                                alt="shopping-basket-success" loading="lazy" />

                                        </div>
                                        <div class="timeline-divider-sep"></div>
                                        <div class="text-sm">Bag</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="cart-address text-center">
                                        <div class="icon-image">
                                            <img src="https://img.icons8.com/clouds/100/address.png" alt="address"
                                                loading="lazy" />

                                        </div>
                                        <div class="timeline-divider-sep"></div>
                                        <div class="text-sm">Delievery</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="cart-payment text-center">
                                        <div class="icon-image">
                                            <img src="https://img.icons8.com/clouds/100/card-in-use.png" alt="card-in-use"
                                                loading="lazy" />

                                        </div>
                                        <div class="text-sm">Payment</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- -------------- carts in some item ------- --}}
                        @php
                            $total = 0;
                        @endphp
                        <div class="row row-sticky pb-4">
                            <div class="col-lg-8 col-12">

                                @php
                                    $i = 0;
                                @endphp

                                @foreach ($cart as $val)
                                    @php
                                        $img = explode(',', $val->product->image);
                                        // ------ discount percentage ------
                                        $dis = $val->product->original_price - $val->product->selling_price;
                                        $dis_count = round(($dis / $val->product->original_price) * 100);
                                    @endphp

                                    <div class="row border-bottom py-3 product-data ">

                                        <div class="col-lg-12 ">

                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                                    <div class="cart-img">
                                                        <img src="{{ asset('image/product/' . $img[0]) }}"
                                                            alt="cart-product" class="img-fluid" loading="lazy"`>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 mt-2 mt-sm-0 text-c">
                                                    <div class="cart-details">

                                                        <h5 class=""><a class="title-hover"
                                                                href="{{ url('category/' . $category[$i]->slug . '/' . $val->product->slug) }}">{{ $val->product->name }}</a>
                                                        </h5>
                                                        <h6><a href="{{ url('category/' . $category[$i]->slug) }}"
                                                                class="text-sm title-hover1">{{ $category[$i]->name }}</a>
                                                        </h6>

                                                        <h4 class="mt-2">₹ {{ $val->product->selling_price }} <span
                                                                class="text-secondary ms-2 fs-6"><s>₹{{ $val->product->original_price }}</s></span>
                                                            <span class="text-success ms-1 fs-6">({{ $dis_count }}%
                                                                off)</span>
                                                        </h4>

                                                        {{-- -----size and quantity ---------- --}}
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-5 col-sm-6 col-6">
                                                                {{-- ----------- product size --------------- --}}
                                                                <div>
                                                                    @php
                                                                        $size = json_decode($val->product->size_list);
                                                                        $men_size = $val->product->couple_men_size ? json_decode($val->product->couple_men_size) : '';
                                                                        $women_size = $val->product->couple_women_size ? json_decode($val->product->couple_women_size) : '';
                                                                        // print_r($men_size);
                                                                        // print_r(gettype($men_size))
                                                                    @endphp
                                                                    <label for="" class="text-sm">size <span
                                                                            class="text-danger">*</span></label>

                                                                    @if ($men_size && $women_size)
                                                                        {{-- -------- couples size -------- --}}
                                                                        <div class="row">
                                                                            <div class=" col-6">
                                                                                <select class="form-select men_size"
                                                                                    required>
                                                                                    <option selected value="">Select
                                                                                        Men's size
                                                                                    </option>
                                                                                    {{-- ---- size get in database --- --}}
                                                                                    @foreach ($men_size as $value)
                                                                                        <option value="{{ $value }}"
                                                                                            {{ $val->mens_size == $value ? 'selected' : '' }}>
                                                                                            {{ $value }}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <select class="form-select women_size"
                                                                                    required>
                                                                                    <option selected value="">Select
                                                                                        Women's size
                                                                                    </option>
                                                                                    {{-- ---- size get in database --- --}}
                                                                                    @foreach ($women_size as $value)
                                                                                        <option value="{{ $value }}"
                                                                                            {{ $val->womens_size == $value ? 'selected' : '' }}>
                                                                                            {{ $value }}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        {{-- -------- common size -------- --}}
                                                                        <div class="row">
                                                                            <div class="col-6">

                                                                                <select class="form-select com_size"
                                                                                    required>
                                                                                    <option selected value="">Choose
                                                                                        your size
                                                                                    </option>
                                                                                    {{-- ---- size get in database --- --}}
                                                                                    @foreach ($size as $value)
                                                                                        <option value="{{ $value }}"
                                                                                            {{ $val->product_size == $value ? 'selected' : '' }}>
                                                                                            {{ $value }}</option>
                                                                                    @endforeach

                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                    @endif


                                                                </div>
                                                            </div>
                                                            {{-- ------------ quantity -------------- --}}
                                                            <div class="col-lg-4 col-md-3 col-sm-4 col-5 ">
                                                                <div class="">
                                                                    <input type="hidden" class="product_id"
                                                                        value="{{ $val->product['id'] }}">
                                                                    <div>
                                                                        @if ($val->product->quantity >= $val->product_qty)
                                                                            <div>
                                                                                <label for=""
                                                                                    class="text-sm">Quantity <span
                                                                                        class="text-danger">*</span></label>
                                                                                <div class="input-group">

                                                                                    <span
                                                                                        class="input-group-text decrement-btn change_Qty"
                                                                                        style="cursor: pointer">-</span>
                                                                                    <input type="text"
                                                                                        class="form-control qty-value text-center"
                                                                                        name="quantity"
                                                                                        value="{{ $val->product_qty }}">
                                                                                    <span
                                                                                        class="input-group-text increment-btn change_Qty"
                                                                                        style="cursor: pointer">+</span>
                                                                                </div>
                                                                            </div>
                                                                            @php
                                                                                $total += $val->product->selling_price * $val->product_qty;
                                                                            @endphp
                                                                        @elseif($val->product->quantity == '0')
                                                                            <label for="" class="text-danger">Not
                                                                                Available</label>
                                                                        @else
                                                                            <label for=""
                                                                                class="text-danger text-sm text-normal">Available
                                                                                only
                                                                                {{ $val->product->quantity }} item, your
                                                                                order exceed
                                                                                click delete & order
                                                                                again</label>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- --------- less quantity message --------- --}}

                                                        <div class="mt-3">
                                                            @if ($val->product->quantity > 0)
                                                                <label for="" class="badge bg-success">In
                                                                    stock</label>
                                                                <label for="" class="text-danger ms-2 text-sm">
                                                                    @if ($val->product->quantity <= 5 && $val->product->quantity >= 1)
                                                                        Hurry up! only {{ $val->product->quantity }} items
                                                                        left...
                                                                    @endif
                                                                </label>
                                                            @else
                                                                <label for="" class="badge bg-danger">Out of
                                                                    stock</label>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    {{-- ---------- remove --------------- --}}

                                                    <div class="mt-4 text-end">
                                                        <button class="btn-blue btn-remove remove-cart "><i
                                                                class="fa-solid fa-trash-can "></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                            $i++;
                                        @endphp
                                    </div>
                                @endforeach
                            </div>



                            <div class="col-lg-4 col-12 mt-4 mt-lg-0 col-stick">
                                @if ($total > 0)
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h5 class="card-title text-body-secondary">Price Details</h5>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="card-text">Price</p>
                                                <p class="card-text fw-bold fs-5">₹ {{ $total }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="card-text">Delivery Charges</p>
                                                <p class="card-text fw-bold fs-5">₹0</p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-text">Total Amount</h5>
                                                <h5 class="card-text fw-bold">₹ {{ $total }}</h5>
                                            </div>
                                            <hr>
                                            {{-- ------------ place order -------------- --}}

                                            <div class="my-3">
                                                <a href="javascript:void(0)" class="btn-blue w-100 checkout-event">Proceed
                                                    to
                                                    Checkout</a>
                                            </div>

                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>


                    @endif
                </div>

            </div>
        </div>
    </section>

@endsection
