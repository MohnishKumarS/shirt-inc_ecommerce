$(document).ready(function () {

    countcart();
    countwishlist();

    
    // ------------ addTocart btn --------------------

    $(document).on('click','.js-addToCart', function (e) {
        e.preventDefault();

        var com_size = $(this).closest('.product-data').find('.com_size');
        var men_size = $(this).closest('.product-data').find('.men_size');
        var women_size = $(this).closest('.product-data').find('.women_size');
        // var com_color = $(this).closest('.product-data').find('#js-colors');
        var pro_color = $(this).closest('.product-data').find('input[name="color"]:checked');
        var pro_style = $(this).closest('.product-data').find('#product-style');
        var size_error = $('.js-size-error')
        // var color_error = $('.js-color-error')

        if(com_size || men_size || women_size){
            if( com_size.val() == '' || men_size.val() == '' || women_size.val() == ''){
                size_error.text('Please choose a size');
                return ;
            }else{
                size_error.text('');
                $size = com_size.val() ;
                $men_size = men_size.val() ;
                $women_size = women_size.val() ;
            }
                      
        }

        if(pro_style,pro_color){
            $pro_color = pro_color.val();
            $pro_style = pro_style.val();
            $pro_design = [$pro_color,$pro_style];
        }

        // console.log($pro_design);
 
        // if(com_color){
        //     if( com_color.val() == ''){
        //         color_error.text('Please choose a color');
        //         return ;
        //     }else{
        //         color_error.text('');
        //         $com_color = com_color.val() ;

        //     }
        // }

        $pro_id = $(this).closest('.product-data').find('.product_id').val();
        $pro_qty = $(this).closest('.product-data').find('.qty-value').val();
        if(!$size){
            $size = "L";
        }

        // ------ajax call ---------
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({

            type: "post",
            url: "/add-to-cart",
            data: {
                pro_id: $pro_id,
                pro_qty: $pro_qty,
                design:$pro_design,
                size:$size,
                men_size:$men_size,
                women_size:$women_size,
            },


            success: function (data) {

                    swal.fire('', data.message, data.status);
                    countcart();
                    // $('.nav-item').load(location.href + ' .nav-item');              

            }
        });


    })

    // ------------------ add to wishlist -----------------

    $('.js-add-wishlist').on('click', function (e) {
        e.preventDefault();
        // console.log(e.target);
        $pro_id = $(this).closest('.product-data').find('.product_id').val();

        // ------ajax call ---------
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({

            type: "post",
            url: "/add-to-wishlist",
            data: {
                pro_id: $pro_id,
            },


            success: function (data) {
                // console.log(data);
                // --------- alert message --------------
                    swal.fire('', data.message, data.status);
                    countwishlist();

                    if(data.status == 'success'){
                    //  $get_id =    $('.product-data').attr('id');
                        console.log($('#product-'+data.pro_id+ ' #icon_heart path'));
                     $('#pro-set-'+data.pro_id + ' #icon_heart path').css('fill','red');
                       
                    }
                    // $('.products-item').load(location.href + ' .products-item');
                    // $.Toast("Awww!", data.message, data.status, {
                    //     has_icon:true,
                    //     has_close_btn:true,
                    //     position_class:'toast-top-right',
                    //     stack: true,
                    //     fullscreen:false,
                    //     timeout:7000,
                    //     sticky:false,
                    //     has_progress:true,
                    //     rtl:false,
                    // });
                



            }
        });


    })

    // ---------------------- freq_both_to_cart ----------------------

    $(document).on('click','.freq_both_to_cart',function(e){
        e.preventDefault();
        $first_pro_id = $(this).closest('.freq-product').find('.first_pro_id').val();
        $freq_pro_id = $(this).closest('.freq-product').find('.freq_pro_id').val();
        $arr_pro_id = [$first_pro_id,$freq_pro_id];
        // console.log($first_pro_id,$freq_pro_id);

           // ------ajax call ---------
           $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:'/add-both-tocart',
            type:'post',
            data:{
                pro_ids:$arr_pro_id
            },

            success:function(data){
                swal.fire('', data.message, data.status);
                countcart();
            }
        })

    })


    // -------------------- remove cart -------------------

    $(document).on('click', '.remove-cart', function () {
        $pro_id = $(this).closest('.product-data').find('.product_id').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/remove-cart",
            data: {
                product_id: $pro_id
            },
            success: function (data) {

                swal.fire('', data.message, data.status);
                //    window.location.reload();
                // ------------ without reload method --------------
                countcart();
                $('.cart-item').load(location.href + ' .cart-item');


            }
        });
    })

    //  ---------------------- count cart ----------------------

    function countcart() {

        $.ajax({
            type: "get",
            url: "/count-cart",
            success: function (data) {
                console.log(data);
                $('.js-cart-items-count').css('display','none');

                if(data.count > 0){
                    $('.js-cart-items-count').css('display','initial');
                    $('.js-cart-items-count').html(data.count);
                }
              
           
            }
        });
    }
    //  ---------------------- count wishlist  ----------------------

    function countwishlist() {

        $.ajax({
            type: "get",
            url: "/count-wishlist",
            success: function (data) {
                console.log(data);
                $('.js-wishlist-count').css('display','none');
                if(data.count > 0){
                    $('.js-wishlist-count').css('display','initial');
                    $('.js-wishlist-count').html(data.count);
                }
               
           
            }
        });
    }


    // -------------------- remove wishlist -------------------

    $(document).on('click', '.remove-wishlist', function () {
        $pro_id = $(this).closest('.product-data').find('.product_id').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/remove-wishlist",
            data: {
                product_id: $pro_id
            },
            success: function (data) {

                swal.fire('', data.message, data.status);
                countwishlist();
                //    window.location.reload();
                $('.wish-item').load(location.href + ' .wish-item');
            }
        });
    })


    // --------------- increment --------------

    $(document).on('click', '.qty-control__increase', function (e) {
        e.preventDefault();

        // $qty_value = $('.qty-value').val();
        $qty_value = $(this).closest('.product-data').find('.qty-value').val();
        $val = parseInt($qty_value, 10);
        $val = isNaN($val) ? 1 : $val;

        if ($val < 10) {
            $val++;
            $(this).closest('.product-data').find('.qty-value').val($val);

        }
        // console.log($val);

    })

    // ----------------- decrement ------------------

    $(document).on('click', '.qty-control__reduce', function (e) {
        e.preventDefault();
  
        $qty_val = $(this).closest('.product-data').find('.qty-value').val();
        var val = parseInt($qty_val);
        val = isNaN(val) ? 1 : val;
        if (val > 1) {
            val--;
            $(this).closest('.product-data').find('.qty-value').val(val);

        }
    })

    // ----------------- change quantity ----------------

    $(document).on('click', '.change_Qty', function (e) {
        e.preventDefault();
        $pro_id = $(this).closest('.product-data').find('.product_id').val();
        $qty_val = $(this).closest('.product-data').find('.qty-value').val();

        data = {
            'product_id': $pro_id,
            'product_qty': $qty_val
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/update-cart",
            data: data,

            success: function (data) {
                // $('#pro-id-'+$pro_id+ ' .shopping-cart__subtotal').text(`Rs. ${data.price * $qty_val}`);
                $('.cart-item').load(location.href + ' .cart-item');
            }
        });

    })
    // ----------------- change color ----------------

    // $(document).on('change', '.js-color-change', function (e) {
    //     e.preventDefault();
    //     $pro_id = $(this).closest('.product-data').find('.product_id').val();
    //     $color = $(this).val();
    //     console.log($color);
    //     $imgValue = $(this).closest('.product-data').find('.js-color-img').val();
    //     $imgValue = JSON.parse($imgValue);
    //     console.log($imgValue[0]);
  
    //     if($color != ''){
    //         $color_arr = $color.split(':');
    //         $color_key = $color_arr[0];
    //         $changeImg =   $(this).closest('.product-data').find('.js-cart__product-img img').attr('src','../../image/product/'+$imgValue[$color_key]);
    //     }

    //     data = {
    //         'product_id': $pro_id,
    //         'product_color': $color ? $color_arr : null 
    //     };

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: "post",
    //         url: "/update-color",
    //         data: data,

    //         success: function (data) {
    //             console.log(data);
    //         }
    //     });

    // })

    // ------------------- change product size ---------------------------

    $(document).on('change','.com_size',function(e){
  
        e.preventDefault();
        $pro_id = $(this).closest('.product-data').find('.product_id').val();
        $size = $(this).val();
        // console.log($pro_id);

        $data = {
            'product_id': $pro_id,
            'product_size': $size
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url:"/update-size",
            type:"post",
            data:$data,

            success:function(data){
                // console.log(data);
            }
        })


    })
    
    // ------------------- change mens size ---------------------------

    $(document).on('change','.men_size',function(e){
  
        e.preventDefault();
        $pro_id = $(this).closest('.product-data').find('.product_id').val();
        $men_size = $(this).val();
        // console.log($pro_id);

        $data = {
            'product_id': $pro_id,
            'pro_men_size': $men_size
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url:"/update-men-size",
            type:"post",
            data:$data,

            success:function(data){
                // console.log(data);
            }
        })


    })

    // ------------------- change  womens size ---------------------------

    $(document).on('change','.women_size',function(e){
        
        e.preventDefault();
        $pro_id = $(this).closest('.product-data').find('.product_id').val();
        $women_size = $(this).val();
        // console.log($pro_id);

        $data = {
            'product_id': $pro_id,
            'pro_women_size': $women_size
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url:"/update-women-size",
            type:"post",
            data:$data,

            success:function(data){
                // console.log(data);
            }
        })


    })


    // ---------------------- validate select size in cart page ----------------

    $(document).on('click','.js-checkout-event',function(){

    var check = true; // <=== Default return value
        $("select").each(function(ind,val){
            $opt  =  $(val).find(":selected").val();
            // console.log($opt);
            if(!$opt){
                $.Toast("Oops!", "please choose a size & color...", "error", {
                    has_icon: true,
                    has_close_btn: true,
                    position_class: 'toast-top-right',
                    stack: true,
                    fullscreen: false,
                    timeout: 6000,
                    sticky: false,
                    has_progress: true,
                    rtl: false,
                });
                
               return check = false;
              
            }
           
        })


        if(check){  // true means redirect to checkout --
             window.location.href = "/checkout";
        }else{
            return check;
        }
        
                      
       
    })

    // ********* checkout page ************

    // ----- edit address  ------------

    $(document).on('click','.editAddr',function(e){
        e.preventDefault();
        $addr_id = $(this).attr('id');
        // console.log($addr_id);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url:"/edit-address",
            type:"post",
            data:{
                'addr_id':$addr_id, 
            },

            success:function(data){
                // console.log(data);
                $('#editAddress .addr_id').val(data.id);
                $('#editAddress .fullname').val(data.full_name);
                $('#editAddress .address').val(data.address);
                $('#editAddress .landmark').val(data.landmark);
                $('#editAddress .city').val(data.city);
                $('#editAddress .pincode').val(data.pincode);
                $('#editAddress .phone').val(data.phone);
                $('#editAddress .del_instr').val(data.delivery_instr);
                $('#editAddress .states').val(data.state).attr("selected", "selected");
                $('#editAddress .default_address').prop('checked', data.status == 1 ? true:false);
            }
        })

    })


 




})
