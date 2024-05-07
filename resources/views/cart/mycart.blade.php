@extends('layouts.userpage')

@section('title', 'My Cart')

@section('content')

<main class="cart-item">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container ">
        <h2 class="page-title">myCart</h2>
        
        @if (count($cart) > 0)
                   {{-- ````````` CART TOPBAR LAYOUT ```````````` --}}
        <div class="checkout-steps">
            <a  class="checkout-steps__item active">
                <span class="checkout-steps__item-number">01</span>
                <span class="checkout-steps__item-title">
                    <span>Shopping Bag</span>
                    <em>Manage Your Items List</em>
                </span>
            </a>
            <a  class="checkout-steps__item<?= ($step??0) > 1 ? "  active" : "" ?>">
                <span class="checkout-steps__item-number">02</span>
                <span class="checkout-steps__item-title">
                    <span>Shipping and Checkout</span>
                    <em>Checkout Your Items List</em>
                </span>
            </a>
            <a class="checkout-steps__item<?= ($step??0) == 3 ? "  active" : "" ?>">
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
                            $radioIndex = 0;
                          @endphp
                        @foreach ($cart as $val)
                        @php
                            $img = explode(',', $val->product->image);
                            // ------ discount percentage ------
                            $dis = $val->product->original_price - $val->product->selling_price;
                            $dis_count = round(($dis / $val->product->original_price) * 100);

                            // ------ total cart  amount ---------
                            $cartTotal += $val->product->selling_price * $val->product_qty;

                            // $cart_color = $val->product_color ? json_decode($val->product_color) : '';
                            $cart_design = $val->product_design ? json_decode($val->product_design) : ['red','half'];
                        @endphp
                           
                                <tr class="product-data" id='pro-id-{{$val->product->id}}' >
                                    <td>
                                        <div class="shopping-cart__product-item js-cart__product-img">
                                            <style>
                                                  /* ------- product design style  ---- */

                                                            .product-single__designImgs .design-image{

                                                                width: 50px;
                                                                height: 50px;

                                                            }
                                            </style>
                                            {{-- <img loading="lazy" src="{{ asset('image/product/' . $img[$cart_color[0]]) }}" width="120" height="120" alt="cart-product"> --}}
                                            @if ($val->product->designType)
                                            <div class="product-single__designImgs">
                                                <img src="{{asset('image/design/Tshirt-grey.png')}}" class="typeImg @if($cart_design[0] == 'grey' && $cart_design[1] == 'half') active @endif"  data-color="grey" data-type="half">
                                                <img src="{{asset('image/design/Tshirt-red.png')}}" class="typeImg @if($cart_design[0] == 'red' && $cart_design[1] == 'half') active @endif" data-color="red" data-type="half">
                                                <img src="{{asset('image/design/Tshirt-black.png')}}" class="typeImg @if($cart_design[0] == 'black' && $cart_design[1] == 'half') active @endif" data-color="black" data-type="half">
                                                <img src="{{asset('image/design/Tshirt-white.png')}}" class="typeImg @if($cart_design[0] == 'white' && $cart_design[1] == 'half') active @endif" data-color="white" data-type="half">
                                                <img src="{{asset('image/design/Tshirt-blue.png')}}" class="typeImg @if($cart_design[0] == 'blue' && $cart_design[1] == 'half') active @endif" data-color="blue" data-type="half">
                                                <img src="{{asset('image/design/sweat-grey.png')}}" class="typeImg @if($cart_design[0] == 'grey' && $cart_design[1] == 'sleeve') active @endif" data-color="grey" data-type="sleeve">
                                                <img src="{{asset('image/design/sweat-red.png')}}" class="typeImg @if($cart_design[0] == 'red' && $cart_design[1] == 'sleeve') active @endif" data-color="red" data-type="sleeve">
                                                <img src="{{asset('image/design/sweat-black.png')}}" class="typeImg @if($cart_design[0] == 'black' && $cart_design[1] == 'sleeve') active @endif" data-color="black" data-type="sleeve">
                                                <img src="{{asset('image/design/sweat-white.png')}}" class="typeImg @if($cart_design[0] == 'white' && $cart_design[1] == 'sleeve') active @endif" data-color="white" data-type="sleeve">
                                                <img src="{{asset('image/design/sweat-blue.png')}}" class="typeImg @if($cart_design[0] == 'blue' && $cart_design[1] == 'sleeve') active @endif" data-color="blue" data-type="sleeve">
                                                <img src="{{asset('image/design/hoodie-grey.png')}}" class="typeImg @if($cart_design[0] == 'grey' && $cart_design[1] == 'hoodie') active @endif" data-color="grey" data-type="hoodie">
                                                <img src="{{asset('image/design/hoodie-red.png')}}" class="typeImg @if($cart_design[0] == 'red' && $cart_design[1] == 'hoodie') active @endif" data-color="red" data-type="hoodie">
                                                <img src="{{asset('image/design/hoodie-black.png')}}" class="typeImg @if($cart_design[0] == 'black' && $cart_design[1] == 'hoodie') active @endif" data-color="black" data-type="hoodie">
                                                <img src="{{asset('image/design/hoodie-white.png')}}" class="typeImg @if($cart_design[0] == 'white' && $cart_design[1] == 'hoodie') active @endif" data-color="white" data-type="hoodie">
                                                <img src="{{asset('image/design/hoodie-blue.png')}}" class="typeImg @if($cart_design[0] == 'blue' && $cart_design[1] == 'hoodie') active @endif" data-color="blue" data-type="hoodie">
                                                <img src="{{asset('image/product/design/'.$val->product->design)}}"  class="design-image">
                                            </div>
                                            @else
                                            <img loading="lazy" src="{{ asset('image/product/' . $img[0]) }}" width="120" height="120" alt="cart-product">
                                            @endif
 
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
                                                            {{-- ---colors and design style  --- --}}
                                                                @if ($val->product->designType)
                                                                <div class="mb-3">
                                                                    {{-- <div class="product-single__swatches">
                                                                        <div class="product-swatch color-swatches">
                                                                        <label>Color</label>
                                                                        <div class="swatch-list">
                                                                            <input type="radio" name="color" id="swatch-{{$radioIndex}}" value="black"  class="colors">
                                                                            <label class="swatch swatch-color js-swatch" for="swatch-{{$radioIndex}}" aria-label="Black" data-bs-toggle="tooltip" data-bs-placement="top" title="Black" style="color: #222"></label>
                                                                            <input type="radio" name="color" id="swatch-{{$radioIndex + 1}}" value="red"  class="colors">
                                                                            <label class="swatch swatch-color js-swatch" for="swatch-{{$radioIndex + 1}}" aria-label="Red" data-bs-toggle="tooltip" data-bs-placement="top" title="Red" style="color: #C93A3E"></label>
                                                                            <input type="radio" name="color" id="swatch-{{$radioIndex + 2}}" value="grey" class="colors">
                                                                            <label class="swatch swatch-color js-swatch" for="swatch-{{$radioIndex + 2}}" aria-label="Grey" data-bs-toggle="tooltip" data-bs-placement="top" title="Grey" style="color: #E4E4E4"></label>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                @php
                                                                    $radioIndex += 3;
                                                                @endphp --}}

                                                                <div class="row">

                                                                    <div class="col-6">
                                                                        <label>Colors <span class="text-danger">*</span></label>
                                                                        <select class="form-select js-product-color" id="product-color"  onchange = "changeDesign( {{ $val->product->id }} )">
                                                                            <!-- <option selected>choose type</option> -->
                                                                            <option value="black" {{$cart_design[0] == 'black' ? 'selected' : '' }}>Black</option>
                                                                            <option value="red" {{$cart_design[0] == 'red' ? 'selected' : '' }}>Red</option>
                                                                            <option value="grey" {{$cart_design[0] == 'grey' ? 'selected' : '' }}>Grey</option>
                                                                            <option value="white" {{$cart_design[0] == 'white' ? 'selected' : '' }}>White</option>
                                                                            <option value="blue" {{$cart_design[0] == 'blue' ? 'selected' : '' }}>Blue</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label>Types <span class="text-danger">*</span></label>
                                                                        <select class="form-select js-product-style" id="product-style"  onchange ="changeDesign( {{$val->product->id}} )">
                                                                            <!-- <option selected>choose type</option> -->
                                                                            <option value="half" {{$cart_design[1] == 'half' ? 'selected' : '' }}>Half Hand</option>
                                                                            <option value="sleeve" {{$cart_design[1] == 'sleeve' ? 'selected' : '' }}>Full sleeve</option>
                                                                            <option value="hoodie" {{$cart_design[1] == 'hoodie' ? 'selected' : '' }}>Hoodie</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                @endif

                                                 {{-- ----------- product size --------------- --}}
                                                 <div>
                                                    @php
                                                        $size = json_decode($val->product->size_list);
                                                        $men_size = $val->product->couple_men_size ? json_decode($val->product->couple_men_size) : '';
                                                        $women_size = $val->product->couple_women_size ? json_decode($val->product->couple_women_size) : '';
                                                        // $colors = $val->product->colors ? json_decode($val->product->colors) : '';
                                                       
                                                    @endphp

                                                    <label for="" class="text-sm">size <span class="text-danger">*</span></label>

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
                                                  {{-- -------- product  colors-------- --}}
                                              {{-- @if ($colors)
                                              <div class="mt-2">                              
                                              <label for="" class="text-sm">Colors <span
                                                  class="text-danger">*</span></label>
                                                 
                                              <div class="row">
                                                  <div class="col-12 col-lg-6">
                                                      <input type="hidden" value="{{ json_encode($img) }}" class="js-color-img">
                                                      <select class="form-select js-color-change"
                                                          required>
                                                          <option selected value="">Choose color </option>
                                                     
                                                          @foreach ($colors as $key=>$value)
                                                              <option value="{{ $key . ':' . $value }}"
                                                                @if($cart_color)  {{ $cart_color[1] == $value ? 'selected' : '' }} @endif>
                                                                  {{ $value }}</option>
                                                          @endforeach

                                                      </select>

                                                  </div>
                                              </div>
                                          </div>
                                              @endif --}}
                                              
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

                                <script>
                                    //    function callActiveDesign(){
                                    //     var productImages = document.querySelectorAll('#pro-id-{{$val->product->id}} .product-single__designImgs .typeImg');
                                    //     // console.log(productImages);
                                    //    var productDesign = {!! json_encode($cart_design) !!};
                                    //     //  console.log(productDesign);
                                    //      if(productDesign){
                                    //         designSetActive(productDesign[0],productDesign[1])
                                    //      }
                                    //      function designSetActive(color,style){
                                    //         console.log(color,style);
                                    //         productImages.forEach(function(img){
                                    //             // Show images with the same color and type, hide others
                                    //             if(img.getAttribute('data-color') === color && img.getAttribute('data-type') === style){
                                    //                 img.classList.add('active');
                                    //             }else{
                                    //                 img.classList.remove('active');
                                    //             }
                                    //         })

                                    //     }
                                    //    };callActiveDesign()

                                </script>

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
                            <button  class="btn btn-primary btn-checkout  js-checkout-event">PROCEED TO CHECKOUT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
                {{-- --- if no products in cart page  --  --}}
                <div class="container">
                    <div class="text-center">
                        <img src="{{ asset('image/empty/cart-empty.png') }}" class="img-fluid" alt="empty-cart" loading="lazy">
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

@endsection


@push('scripts')
<script>

      // ---- product fixed design image and change image depends on color
    
    //   $(document).on('change','#product-style',function(e){
    //     e.preventDefault();
    //     $pro_id = $(this).closest('.product-data').find('.product_id').val();
    //     $pro_color = $(this).closest('.product-data').find('#product-color').val();
    //     $pro_style = $(this).val();
    //     console.log($pro_color);
    //   })
// ----- change and update design style in CART PAGE -----
      function changeDesign(productId){
        $pro_id = productId;
        $pro_color = $('#pro-id-'+$pro_id + ' .js-product-color').val();
        $pro_style = $('#pro-id-'+$pro_id + ' .js-product-style').val();

        designSetActive($pro_color,$pro_style,$pro_id);
        // console.log($pro_color,$pro_style);

        // ajax request
   
        $.ajax({
            url:'/update-design-style',
            type:'POST',
            data:{
                _token:'{{ csrf_token() }}',
                product_id:$pro_id,
                product_color:$pro_color,
                product_style:$pro_style
            },
            success:function(data){
                console.log(data);
            }
        })
      }
          
    function designSetActive(color,style,id){
        const productImages = document.querySelectorAll('#pro-id-'+id +' .product-single__designImgs .typeImg');
        productImages.forEach(function(img){
              // Show images with the same color and type, hide others
            if(img.getAttribute('data-color') === color && img.getAttribute('data-type') === style){
                img.classList.add('active');
            }else{
                img.classList.remove('active');
            }
        })

    }

// ------ product design type selection ------
// document.addEventListener('DOMContentLoaded', function() {
//   const checkedColor = $('input[name="color"]:checked').val();
//     const checkedStyle = $('#product-style').val();
//     const productImages = document.querySelectorAll('.product-single__designImgs .typeImg');
    
//     const colorRadios  = document.querySelectorAll('input[name="color"]');
//     const styleOptions = document.getElementById('product-style');

//     // Add change event listener to the select product style 
//    if(styleOptions){
//     styleOptions.addEventListener('change',function(){
//         const selectedStyle = styleOptions.value;
//         const selectedColor = $('input[name="color"]:checked').val();
//         designSetActive(selectedColor,selectedStyle);
//     })
//    }

//     // Add change event listener to each radio button
//     colorRadios.forEach((radio) => {
//         radio.addEventListener('change',function(){
//             const selectedColor  = this.value;
//             const selectedStyle = $('#product-style').val();
//             designSetActive(selectedColor,selectedStyle);
//         })
//     });
    

//     designSetActive(checkedColor, checkedStyle);




// });

</script>
@endpush