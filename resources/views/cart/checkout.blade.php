@extends('layouts.userpage')

@section('title', 'checkout')

@section('content')
    @php
        $step = 2;
    @endphp

    <main>
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Shipping and Checkout</h2>

            {{-- ````````` CART TOPBAR LAYOUT ```````````` --}}

            <div class="checkout-steps">
                <a href="{{ URL('my-cart') }}" class="checkout-steps__item">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="javascript:void(0)" class="checkout-steps__item<?= ($step ?? 0) > 1 ? '  active' : '' ?>">
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Shipping and Checkout</span>
                        <em>Checkout Your Items List</em>
                    </span>
                </a>
                <a href="{{ url('order-confirm') }}" class="checkout-steps__item<?= ($step ?? 0) == 3 ? '  active' : '' ?>">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div>


            @if ($cart->count() > 0)
                {{-- CHECKOUT CART --}}
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <div>
                            <h4>Basic Details</h4>
                            <hr>
                            <div class="row align-items-center mb-4">
                                <div class="col">
                                    <div>
                                        <h6>Select Delivery Address</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <button type="button" class="btn-prime" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            + Add new address
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- ------ delivery address --}}

                            @forelse ($user_address as $item)
                                <div class="select-address mb-2 px-2">
                                    <div class="row border py-3 justify-content-center">
                                        <div class="col-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="{{ $item->id }}"
                                                    name="select_address" {{ $item->status == true ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="address-details">
                                                <h5 class="text-sm-bold mb-2">{{ $item->full_name }}</h5>
                                                <p class="text-sm text-capitalize"><i
                                                        class="fa-solid fa-location-dot me-2"></i>
                                                    {{ $item->address }},{{ $item->landmark }},<br>
                                                    {{ $item->city }} , {{ $item->state }} - {{ $item->pincode }}. <br>
                                                    <i class="fa-solid fa-phone me-2"></i>{{ $item->phone }}. <br>
                                                    @if ($item->delivery_instr)
                                                        <i
                                                            class="fa-solid fa-bookmark me-2"></i>{{ $item->delivery_instr }}
                                                    @endif

                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <Style>
                                                .select-address .editAddr,
                                                .select-address .deleteAddr {
                                                    border: none;
                                                    outline: none;
                                                    background: transparent;
                                                }

                                                .select-address form {
                                                    display: inline
                                                }
                                            </Style>
                                            <div>
                                                <button class="text-danger editAddr" data-bs-toggle="modal"
                                                    data-bs-target="#editAddress" title="edit" id="{{ $item->id }}">
                                                    <i class="fa-solid fa-pen-to-square "></i>
                                                </button>
                                                {{-- <form action="{{ url('/delete-address') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="addr_id" value="{{ $item->id }}"
                                                        class="addr_id">
                                                    <button class="text-danger deleteAddr" title="delete">
                                                        <i class="fa-solid fa-trash-can"></i></i>
                                                    </button>
                                                </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="my-4">
                                    <div class="alert alert-danger" role="alert">
                                        Please add a new address detail <i
                                            class="fa-solid fa-location-dot fa-bounce fs-5"></i>
                                    </div>
                                </div>
                            @endforelse


                        </div>
                        {{-- <h4>BILLING DETAILS</h4> --}}
                        {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="checkout_first_name" placeholder="First Name">
                                        <label for="checkout_first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="checkout_last_name" placeholder="Last Name">
                                        <label for="checkout_last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="checkout_company_name" placeholder="Company Name (optional)">
                                        <label for="checkout_company_name">Company Name (optional)</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="search-field my-3">
                                        <div class="form-label-fixed hover-container">
                                            <label for="search-dropdown" class="form-label">Country / Region*</label>
                                            <div class="js-hover__open">
                                                <input type="text" class="form-control form-control-lg search-field__actor search-field__arrow-down" id="search-dropdown" name="search-keyword" readonly placeholder="Choose a location...">
                                            </div>
                                            <div class="filters-container js-hidden-content mt-2">
                                                <div class="search-field__input-wrapper">
                                                    <input type="text" class="search-field__input form-control form-control-sm bg-lighter border-lighter" placeholder="Search">
                                                </div>
                                                <ul class="search-suggestion list-unstyled">
                                                    <li class="search-suggestion__item js-search-select">Australia</li>
                                                    <li class="search-suggestion__item js-search-select">Canada</li>
                                                    <li class="search-suggestion__item js-search-select">United Kingdom</li>
                                                    <li class="search-suggestion__item js-search-select">United States</li>
                                                    <li class="search-suggestion__item js-search-select">Turkey</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="text" class="form-control" id="checkout_street_address" placeholder="Street Address *">
                                        <label for="checkout_company_name">Street Address *</label>
                                    </div>
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="text" class="form-control" id="checkout_street_address_2">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="checkout_city" placeholder="Town / City *">
                                        <label for="checkout_city">Town / City *</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="checkout_zipcode" placeholder="Postcode / ZIP *">
                                        <label for="checkout_zipcode">Postcode / ZIP *</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="checkout_province" placeholder="Province *">
                                        <label for="checkout_province">Province *</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="checkout_phone" placeholder="Phone *">
                                        <label for="checkout_phone">Phone *</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="email" class="form-control" id="checkout_email" placeholder="Your Mail *">
                                        <label for="checkout_email">Your Mail *</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check mt-3">
                                        <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="create_account">
                                        <label class="form-check-label" for="create_account">CREATE AN ACCOUNT?</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="ship_different_address">
                                        <label class="form-check-label" for="ship_different_address">SHIP TO A DIFFERENT ADDRESS?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mt-3">
                                    <textarea class="form-control form-control_gray" placeholder="Order Notes (optional)" cols="30" rows="8"></textarea>
                                </div>
                            </div> --}}
                    </div>
                    <div class="checkout__totals-wrapper">
                        <div class="sticky-content">
                            <h4>Order Summary</h4>
                            <hr>

                            @if ($cart->count() > 0)
                                {{-- ---------- product in carts table --------------- --}}
                                <table class="table text-center">
                                    <tr class="text-sm-bold">
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                    @php
                                        $total = 0;

                                    @endphp
                                    @foreach ($cart as $item)
                                        @php
                                            $img = explode(',', $item->product->image);

                                            $cart_design = $item->product_design
                                                ? json_decode($item->product_design)
                                                : ['red', 'half'];

                                        @endphp
                                        <style>
                                            /* ------- product design style  ---- */

                                            .product-single__designImgs img {
                                                width: 65px;
                                            }

                                            .product-single__designImgs .design-image {
                                                width: 15px;
                                            }
                                        </style>
                                        <tr class="align-middle">
                                            <td>
                                                @if ($item->product->designType)
                                                    <div class="product-single__designImgs">
                                                        <img src="{{ asset('image/design/Tshirt-grey.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'grey' && $cart_design[1] == 'half') active @endif"
                                                            data-color="grey" data-type="half">
                                                        <img src="{{ asset('image/design/Tshirt-red.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'red' && $cart_design[1] == 'half') active @endif"
                                                            data-color="red" data-type="half">
                                                        <img src="{{ asset('image/design/Tshirt-black.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'black' && $cart_design[1] == 'half') active @endif"
                                                            data-color="black" data-type="half">
                                                        <img src="{{ asset('image/design/Tshirt-white.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'white' && $cart_design[1] == 'half') active @endif"
                                                            data-color="white" data-type="half">
                                                        <img src="{{ asset('image/design/Tshirt-blue.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'blue' && $cart_design[1] == 'half') active @endif"
                                                            data-color="blue" data-type="half">
                                                        <img src="{{ asset('image/design/sweat-grey.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'grey' && $cart_design[1] == 'sleeve') active @endif"
                                                            data-color="grey" data-type="sleeve">
                                                        <img src="{{ asset('image/design/sweat-red.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'red' && $cart_design[1] == 'sleeve') active @endif"
                                                            data-color="red" data-type="sleeve">
                                                        <img src="{{ asset('image/design/sweat-black.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'black' && $cart_design[1] == 'sleeve') active @endif"
                                                            data-color="black" data-type="sleeve">
                                                        <img src="{{ asset('image/design/sweat-white.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'white' && $cart_design[1] == 'sleeve') active @endif"
                                                            data-color="white" data-type="sleeve">
                                                        <img src="{{ asset('image/design/sweat-blue.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'blue' && $cart_design[1] == 'sleeve') active @endif"
                                                            data-color="blue" data-type="sleeve">
                                                        <img src="{{ asset('image/design/hoodie-grey.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'grey' && $cart_design[1] == 'hoodie') active @endif"
                                                            data-color="grey" data-type="hoodie">
                                                        <img src="{{ asset('image/design/hoodie-red.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'red' && $cart_design[1] == 'hoodie') active @endif"
                                                            data-color="red" data-type="hoodie">
                                                        <img src="{{ asset('image/design/hoodie-black.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'black' && $cart_design[1] == 'hoodie') active @endif"
                                                            data-color="black" data-type="hoodie">
                                                        <img src="{{ asset('image/design/hoodie-white.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'white' && $cart_design[1] == 'hoodie') active @endif"
                                                            data-color="white" data-type="hoodie">
                                                        <img src="{{ asset('image/design/hoodie-blue.png') }}"
                                                            class="typeImg @if ($cart_design[0] == 'blue' && $cart_design[1] == 'hoodie') active @endif"
                                                            data-color="blue" data-type="hoodie">
                                                        <img src="{{ asset('image/product/design/' . $item->product->design) }}"
                                                            class="design-image">
                                                    </div>
                                                @else
                                                    <img src="{{ asset('image/product/' . $img[0]) }}" width="65"
                                                        class="img-fluid" alt="{{ $item->product->name }}"
                                                        loading="lazy">
                                                @endif
                                            </td>
                                            <td><span>{{ $item->product->name }}</span> <br>
                                                {{-- - -- size cart --- --}}
                                                <span>
                                                    @if ($item->mens_size)
                                                        <small>(size for men:{{ $item->mens_size }} &
                                                            women : {{ $item->womens_size }})</small>
                                                    @else
                                                        <small>(size : {{ $item->product_size }})</small>
                                                    @endif
                                                </span>
                                                @if ($cart_design)
                                                    <div>
                                                        <small>(color : {{ $cart_design[0] }} & type :
                                                            {{ $cart_design[1] }})</small>
                                                    </div>
                                                @endif

                                            </td>
                                            <td>{{ $item->product_qty }}</td>
                                            <td>{{ $item->product->selling_price * $item->product_qty }}</td>

                                        </tr>
                                        @php
                                            $total = $total + $item->product_qty * $item->product->selling_price;
                                        @endphp
                                    @endforeach
                                    <tr class="fw-bold">
                                        <td>Total</td>
                                        <td colspan="3" class="text-end">₹ {{ $total }}</td>
                                    </tr>

                                </table>

                                {{-- -------- place order btn --- --}}
                                {{-- <div class="my-3">
                                    <button class="btn-float w-100 payment-btn" type="button">Place Order</button>
                                </div> --}}
                                <div class="my-4">
                                    <a class="btn-float w-100 payment-btn">Place Order</a>
                                </div>
                            @else
                                <div class="text-center fs-5 text-danger">
                                    <p>No products in cart <i class="fa-solid fa-cart-plus mx-1"></i></p>

                                </div>
                                <hr>
                            @endif




                            <div class="checkout__totals">
                                <h3>Your Order</h3>
                                <table class="checkout-cart-items">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th>SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> Zessi Dresses x 2</td>
                                            <td> Rs.32.50 </td>
                                        </tr>
                                        <tr>
                                            <td> Kirby T-Shirt </td>
                                            <td> Rs.29.90 </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td>Rs.62.40</td>
                                        </tr>
                                        <tr>
                                            <th>SHIPPING</th>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr>
                                            <th>GST</th>
                                            <td>Rs.19</td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL</th>
                                            <td>Rs.81.40</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__payment-methods">
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio"
                                        name="checkout_payment_method" id="checkout_payment_method_1">
                                    <label class="form-check-label" for="checkout_payment_method_1">
                                        Cash on delivery
                                        <span class="option-detail d-block">
                                            Extra Rs.150
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio"
                                        name="checkout_payment_method" id="checkout_payment_method_2">
                                    <label class="form-check-label" for="checkout_payment_method_2">
                                        Phonepe
                                    </label>
                                </div>
                                <div class="policy-text">
                                    Your personal data will be used to process your order, support your experience
                                    throughout this website, and for other purposes described in our <a
                                        href="<?= $url ?>privacy-policy" target="_blank">privacy policy</a>.
                                </div>
                            </div>
                            <div class="mobile_fixed-btn_wrapper">
                                <div class="button-wrapper container">
                                    <button class="btn btn-primary btn-checkout payment-btn">PLACE ORDER</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @else
                {{-- --- if no products in cart page  --  --}}
                <div class="container">
                    <div class="text-center">
                        <img src="{{ asset('image/empty/cart-empty.png') }}" class="img-fluid" alt="empty-cart"
                            loading="lazy">
                        <h3>Your Cart is Empty!</h3>
                        <p> Must add items on the cart before you proceed to check out.</p>
                        <div class="mt-4">
                            <a href="{{ url('/collections') }}" class="btn btn-primary"> <i
                                    class="fa-solid fa-bag-shopping me-1"></i> Return to shop</a>
                        </div>
                    </div>
                </div>
            @endif



        </section>
    </main>

    <div class="mb-5 pb-xl-5"></div>


    <!-- Button trigger modal -->
    <style>
        .checkout-modal .row>div {
            margin-bottom: 16px;
        }
    </style>

    <!-- add address details -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog checkout-modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('add-address') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control fullname" name="full_name" required
                                        placeholder="Full Name">
                                    <label>Full Name*</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control address" name="address" required
                                        placeholder="address">
                                    <label class="">Address (House no,Building name,Street)*</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control landmark" name="landmark"
                                        placeholder="landmark">
                                    <label class="">Landmark (Optional)*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <select class="form-select" name="state" required>
                                        <option selected value="">choose your state</option>
                                        @foreach ($states as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">State*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control city" name="city" required
                                        placeholder="city">
                                    <label class="label-head">City / District*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control pincode" name="pincode"
                                        title="Please enter  6 digits pincode" placeholder="pincode" maxlength="6"
                                        minlength="6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"
                                        pattern="[0-9]{6}" required>
                                    <label>Pincode 6 digits [0-9]*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control phone" name="phone"
                                        title="Please enter valid 10 digits number" placeholder="phone" minlength="10"
                                        maxlength="10" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"
                                        pattern="[1-9]{1}[0-9]{9}" required>
                                    <label>Phone Number*</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control del_instr" placeholder="Leave a comment here" name='del_instr'></textarea>
                                    <label for="floatingTextarea">Delivery Instruction (optional)*</label>
                                </div>
                                <div class="text-sm text-capitalize">Enter necessary information like door codes or
                                    drop-off instructions.</div>
                            </div>
                            <div class="col-lg-12">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check address_type" name="address_type"
                                        id="btnradio1" value="Home" checked>
                                    <label class="btn btn-outline-info btn-sm" for="btnradio1">Home</label>

                                    <input type="radio" class="btn-check address_type" name="address_type"
                                        id="btnradio2" value="Work">
                                    <label class="btn btn-outline-info btn-sm" for="btnradio2">Work</label>

                                    <input type="radio" class="btn-check address_type" name="address_type"
                                        id="btnradio3" value="Others">
                                    <label class="btn btn-outline-info btn-sm" for="btnradio3">Others</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input default_address" type="checkbox" role="switch"
                                        name="current_address" checked>
                                    <label class="form-check-label">Make this my default address</label>
                                </div>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-blue btn-remove" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn-blue add_addr_btn">save address</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--end  add address details -->

    <!-- Edit address details -->
    <div class="modal fade" id="editAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog checkout-modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update-address') }}" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="addr_id" value="" class="addr_id">
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control fullname" name="full_name" required
                                        placeholder="Full Name">
                                    <label>Full Name*</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control address" name="address" required
                                        placeholder="address">
                                    <label class="">Address (House no,Building name,Street)*</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control landmark" name="landmark"
                                        placeholder="landmark">
                                    <label class="">Landmark (Optional)*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <select class="form-select states" name="state" required>
                                        <option selected value="">choose your state</option>
                                        @foreach ($states as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">State*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control city" name="city" required
                                        placeholder="city">
                                    <label class="label-head">City / District*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control pincode" name="pincode" required
                                        onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" pattern="[0-9]{6}"
                                        placeholder="pincode" title="Please enter 6 digits pincode" maxlength="6">
                                    <label>Pincode 6 digits [0-9]*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control phone" name="phone" required
                                        onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" pattern="[1-9]{1}[0-9]{9}"
                                        placeholder="phone" title="Please enter valid  10 digits number" maxlength="10">
                                    <label>Phone Number*</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control del_instr" placeholder="Leave a comment here" name='del_instr'></textarea>
                                    <label for="floatingTextarea">Delivery Instruction (optional)*</label>
                                </div>
                                <div class="text-sm text-capitalize">Enter necessary information like door codes or
                                    drop-off instructions.</div>
                            </div>
                            <div class="col-lg-12">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check address_type" name="address_type"
                                        id="btnradio11" value="Home" checked>
                                    <label class="btn btn-outline-info btn-sm" for="btnradio11">Home</label>

                                    <input type="radio" class="btn-check address_type" name="address_type"
                                        id="btnradio22" value="Work">
                                    <label class="btn btn-outline-info btn-sm" for="btnradio22">Work</label>

                                    <input type="radio" class="btn-check address_type" name="address_type"
                                        id="btnradio33" value="Others">
                                    <label class="btn btn-outline-info btn-sm" for="btnradio33">Others</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input default_address" type="checkbox" role="switch"
                                        name="current_address" checked>
                                    <label class="form-check-label">Make this my default address</label>
                                </div>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-blue btn-remove" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn-blue">update address</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--edit  add address details -->

@endsection
