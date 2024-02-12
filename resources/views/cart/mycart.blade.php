@extends('layouts.userpage')

@section('title', 'My Cart')

@section('content')

<main class="cart-item">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container ">
        <h2 class="page-title">Cart</h2>
        
        {{-- ````````` CART TOPBAR LAYOUT ```````````` --}}
        <div class="checkout-steps">
            <a  class="checkout-steps__item active">
                <span class="checkout-steps__item-number">01</span>
                <span class="checkout-steps__item-title">
                    <span>Shopping Bag</span>
                    <em>Manage Your Items List</em>
                </span>
            </a>
            <a href="{{url('checkout')}}" class="checkout-steps__item<?= ($step??0) > 1 ? "  active" : "" ?>">
                <span class="checkout-steps__item-number">02</span>
                <span class="checkout-steps__item-title">
                    <span>Shipping and Checkout</span>
                    <em>Checkout Your Items List</em>
                </span>
            </a>
            <a href="confirm" class="checkout-steps__item<?= ($step??0) == 3 ? "  active" : "" ?>">
                <span class="checkout-steps__item-number">03</span>
                <span class="checkout-steps__item-title">
                    <span>Confirmation</span>
                    <em>Review And Submit Your Order</em>
                </span>
            </a>
        </div>

        {{-- ````````````SHOPPING CART ```````````````````` --}}
        <div class="shopping-cart ">
            <div class="cart-table__wrapper">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th></th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      

                        {{-- -------- CART LIST PRODUCT  ------------ --}}
                          @php
                            $cartTotal = 0;
                          @endphp
                        @foreach ($cart as $val)
                        @php
                            $img = explode(',', $val->product->image);
                            // ------ discount percentage ------
                            $dis = $val->product->original_price - $val->product->selling_price;
                            $dis_count = round(($dis / $val->product->original_price) * 100);

                            // ------ total cart  amount ---------
                            $cartTotal += $val->product->selling_price * $val->product_qty;
                        @endphp

                                <tr class="product-data">
                                    <td>
                                        <div class="shopping-cart__product-item">
                                            <img loading="lazy" src="{{ asset('image/product/' . $img[0]) }}" width="120" height="120" alt="cart-product">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="shopping-cart__product-item__detail">
                                            <h4>
                                                <a href="{{url('category/'.$val->product->category->slug.'/'.$val->product->slug)}}">
                                                    {{ $val->product->name }}
                                                </a>
                                            </h4>
                                            <ul class="shopping-cart__product-item__options">
                                                {{-- <li>Color: Yellow</li> --}}

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
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="shopping-cart__product-price">Rs.{{ $val->product->selling_price }}</span>
                                    </td>
                                    <td>
                                        <input type="hidden" class="product_id"  value="{{ $val->product['id'] }}">
                                        <div class="qty-control position-relative">
                                            <input type="number" name="quantity" value="{{ $val->product_qty }}" min="1" class="qty-control__number text-center qty-value">
                                            <div class="qty-control__reduce change_Qty">-</div>
                                            <div class="qty-control__increase change_Qty">+</div>
                                        </div><!-- .qty-control -->
                                    </td>
                                    <td>
                                        <span class="shopping-cart__subtotal">Rs.{{$val->product->selling_price * $val->product_qty}}</span>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="remove-cart">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>

                        @endforeach

                    </tbody>
                </table>
                <div class="cart-table-footer">
                    <form action="./" class="position-relative bg-body">
                        <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code">
                        <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit" value="APPLY COUPON">
                    </form>
                    {{-- <button class="btn btn-light">UPDATE CART</button> --}}
                </div>
            </div>
            <div class="shopping-cart__totals-wrapper">
                <div class="sticky-content">
                    <div class="shopping-cart__totals">
                        <h3>Cart Totals</h3>
                        <table class="cart-totals">
                            <tbody>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>Rs.{{ $cartTotal }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="free_shipping">
                                            <label class="form-check-label" for="free_shipping">Free shipping</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="flat_rate">
                                            <label class="form-check-label" for="flat_rate">Flat rate: Rs.49</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="local_pickup">
                                            <label class="form-check-label" for="local_pickup">Local pickup: Rs.8</label>
                                        </div>
                                        <div>Shipping to AL.</div>
                                        <div>
                                            <a href="#" class="menu-link menu-link_us-s">CHANGE ADDRESS</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>GST</th>
                                    <td>Rs.19</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>Rs.{{ $cartTotal }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mobile_fixed-btn_wrapper">
                        <div class="button-wrapper container">
                            <button  class="btn btn-primary btn-checkout  checkout-event">PROCEED TO CHECKOUT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="mb-5 pb-xl-5"></div>

@endsection
