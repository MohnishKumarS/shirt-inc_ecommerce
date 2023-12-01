@extends('layouts.userpage')

@section('title', 'checkout')

@section('content')

    <div class="checkout">
        <div class="container">
            <h2 class="m-3">Checkout</h2>

            <hr>
            {{-- ------ timeline cart ------ --}}
            <div class="cart-timeline">
                <div class="row px-5">
                    <div class="col">
                        <div class="cart-bag text-center">
                            <div class="icon-image">
                                <img class="active" src="https://img.icons8.com/clouds/100/shopping-basket-success.png"
                                    alt="shopping-basket-success" loading="lazy"/>

                            </div>
                            <div class="timeline-divider-sep active"></div>
                            <div class="text-sm">Bag</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="cart-address text-center">
                            <div class="icon-image">
                                <img class="active" src="https://img.icons8.com/clouds/100/address.png" alt="address" loading="lazy"/>

                            </div>
                            <div class="timeline-divider-sep"></div>
                            <div class="text-sm">Delievery</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="cart-payment text-center">
                            <div class="icon-image">
                                <img src="https://img.icons8.com/clouds/100/card-in-use.png" alt="card-in-use" loading="lazy"/>

                            </div>
                            <div class="text-sm">Payment</div>

                        </div>
                    </div>
                </div>
            </div>

            <style>

            </style>

            <div class="row justify-content-around mb-5">
                <div class="col-lg-6  border py-3 bg-white">
                    <h5>Basic Details</h5>
                    <hr>
                    @php
                        $est_date1 = date('l,M d', strtotime('+5 days'));
                        $est_date2 = date('l,M d', strtotime('+7 days'));
                    @endphp
                    <div class="mb-2">
                        <p class="text-sm">Estimated arrival on :
                            <span class="text-sm-bold" style="color: #212529"> {{ $est_date1 . ' - ' . $est_date2 }} </span>
                        </p>
                    </div>
                    <div>
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

                        {{-- ------ display error ------ --}}

                        <div class="text-danger error text-sm"></div>


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
                                            <p class="text-sm text-capitalize"><i class="fa-solid fa-location-dot me-2"></i>
                                                {{ $item->address }},{{ $item->landmark }},<br>
                                                {{ $item->city }} , {{ $item->state }} - {{ $item->pincode }}. <br>
                                                <i class="fa-solid fa-phone me-2"></i>{{ $item->phone }}. <br>
                                                @if ($item->delivery_instr)
                                                    <i class="fa-solid fa-bookmark me-2"></i>{{ $item->delivery_instr }}
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
                                    Please add a new address detail  <i class="fa-solid fa-location-dot fa-bounce fs-5"></i>
                                </div>
                            </div>
                        @endforelse


                    </div>


                </div>
                <div class="col-lg-5 mt-4 mt-lg-0  border py-3 bg-white shadow">
                    <h5>Order Summary</h5>
                    <hr>

                    @if ($cart->count() > 0)
                        {{-- ---------- product in carts table --------------- --}}
                        <table class="table">
                            <tr>
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
                                @endphp
                                <tr class="align-middle">
                                    <td><img src="{{ asset('image/product/' . $img[0]) }}" width="65" class="img-fluid"
                                            alt="products-image" loading="lazy"></td>
                                    <td>{{ $item->product->name }} <br>
                                        {{-- - -- size cart --- --}}
                                        @if ($item->mens_size)
                                            <small>(size for men:{{ $item->mens_size }} &
                                                women:{{ $item->womens_size }})</small>
                                        @else
                                            <small>(size:{{ $item->product_size }})</small>
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
                        <hr>
                        {{-- -------- place order btn --- --}}
                        {{-- <div class="my-3">
                            <button class="btn-float w-100 payment-btn" type="button">Place Order</button>
                        </div> --}}
                        <div class="my-3">
                            <a class="btn-float w-100 payment-btn" href="payment-method" >Place Order Phonepay</a>
                        </div>
                      
                            
                    @else
                        <div class="text-center fs-5 text-danger">
                            <p>No products in cart <i class="fa-solid fa-cart-plus mx-1"></i></p>

                        </div>
                        <hr>
                    @endif



                </div>
            </div>
        </div>
    </div>

    @if(Session::has('total'))
       
    <div class="container text-center mx-auto">
    <form action="{{url('/place-order')}}" method="POST" class="text-center mx-auto mt-5" >
      <script
          src="https://checkout.razorpay.com/v1/checkout.js"
          data-key="rzp_test_gMw9oGZr3d5DEF"
          data-amount="{{Session::get('total')}}" 
          data-currency="INR"
          data-order_id="{{Session::get('order_id')}}"
          {{-- data-buttontext="Pay with Razorpay" --}}
          data-name="Shirt-Inc"
          data-description="Thank you for choosing us...."
         data-prefill.name = '{{Auth::user()->name}}';
         data-prefill.email = '{{Auth::user()->email}}';
         data-prefill.contact = '{{Auth::user()->mobile}}';
         data-image = "{{asset('image/shirtinc-logo.png')}}"
          data-theme.color="#3399cc"
          id="payment-order"
      ></script>
      <input type="hidden" custom="Hidden Element" name="hidden">
      <input type="hidden" name="total" value="{{Session::get('total')}}">
      <input type="hidden" name="addr_id" value="{{Session::get('addr_id')}}">
      </form>
 
    </div>
    <style>
        .razorpay-payment-button{
            visibility: hidden;
        }
    </style>
    {{-- <script>
        window.onload = function(){
            document.querySelector('.razorpay-payment-button').style.visiblity = 'hidden';
            document.querySelector('.razorpay-payment-button').click();
}
      </script> --}}
    @endif
    <!-- Button trigger modal -->
    <style>
        .checkout-modal .row > div {
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
                                    <input type="text" class="form-control pincode" name="pincode" title="Please enter  6 digits pincode"
                                        placeholder="pincode"  maxlength="6" minlength="6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" pattern="[0-9]{6}"  required>
                                    <label>Pincode 6 digits [0-9]*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control phone" name="phone"   title="Please enter valid 10 digits number"
                                        placeholder="phone" minlength="10"   maxlength="10" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"  pattern="[1-9]{1}[0-9]{9}" required>
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
                                    <input type="text" class="form-control pincode" name="pincode" required onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"  pattern="[0-9]{6}"
                                        placeholder="pincode"  title="Please enter 6 digits pincode" maxlength="6">
                                    <label>Pincode 6 digits [0-9]*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control phone" name="phone" required onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"  pattern="[1-9]{1}[0-9]{9}"
                                        placeholder="phone"  title="Please enter valid  10 digits number" maxlength="10">
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

@section('scripts')

    <script>
        // --------- - adding new address btn to submit - - - -

        function timeline_border() {
            $addr_val = $('.select-address');
            //    $val2 = document.querySelector('.select-address').length;
            if ($addr_val.length > 0) {
                $cart_addr = $('.cart-timeline').find('.cart-address .timeline-divider-sep');
                $cart_addr.addClass('active');
            }
        }

        timeline_border();
    </script>
    {{-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script> --}}

@endsection
