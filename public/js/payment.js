$(document).ready(function () {
    // ------------ payment btn click events -------------


    $('.payment-btn').on('click', function (e) {
        // console.log(e.target);
   $addr = $('input[type="radio"][name="select_address"]:checked').val();
   if($addr){
    $addr_id = $addr;

        

    // ------------ payment method ------------------
  
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
       $.ajax({
           type: "post",
           url: "proceed-to-pay",
           data: {
            'addr_id':$addr_id
           },
           success: function (data) {
            console.log(data);
            window.location.href = '/checkout';

            
            //     var options = {
            //         "key": "rzp_test_KpCKxppkCytzcE", // Enter the Key ID generated from the Dashboard
            //         "amount": 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            //         "currency": "INR",
            //         "name": 'Shirt-Inc', //your business name
            //         "description": "Thank you for choosing us....",
            //         "image": "https://example.com/your_logo",
            //         "order_id": data.order_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            //         "handler": function (response){
            //             console.log(response);
            //             // console.log(response.razorpay_signature);

            //             // $.ajax({
            //             //     type: "post",
            //             //     url: "/place-order",
            //             //     data: {
            //             //         'addr_id' : $addr_id,
            //             //         'payment_mode' : "Paid By DebitCard",
            //             //         'payment_id' : response.razorpay_payment_id
            //             //     },
            //             //     success: function (data) {
            //             //         swal.fire('',data.message,data.status).then((res)=>{

            //             //             if(res.isConfirmed){
            //             //                 window.location.href = '/my-order';
            //             //             }
            //             //         });
            //             //         setTimeout(() => {
            //             //             window.location.href = "/my-order";
            //             //         }, 1500);
                              
            //             //     }
            //             // });


                     
            //         },
            //         "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
            //             "name": 'moni', //your customer's name
            //             "email": 'moni@gmail.com', 
            //             "contact": '7418667102' //Provide the customer's phone number for better conversion rates 
            //         },
                  
            //         "theme": {
            //             "color": "#3399cc"
            //         }
            //     };
            //     var rzp1 = new Razorpay(options);
            //     rzp1.on('payment.failed', function (response){
            //         alert(response.error.code);
            //         alert(response.error.description);
            //         alert(response.error.source);
            //         alert(response.error.step);
            //         alert(response.error.reason);
            //         alert(response.error.metadata.order_id);
            //         alert(response.error.metadata.payment_id);
            // });
          
            //         rzp1.open();
             



           }
       });


   }
   else{
       $('.error').html('Choose a shipping address to continue...<i class="fa-solid fa-map-pin fa-bounce fs-5"></i>');
       return false;
   }
       





       


    })
})
