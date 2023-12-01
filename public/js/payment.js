$(document).ready(function () {
    // ------------ payment btn click events -------------


    $('.payment-btn').on('click', function (e) {
        // console.log(e.target);
   $addr = $('input[type="radio"][name="select_address"]:checked').val();
   if($addr){
    $addr_id = $addr;

    return true;

   }
   else{
       $('.error').html('Choose a shipping address to continue...<i class="fa-solid fa-map-pin fa-bounce fs-5"></i>');
       return false;
   }
       





       


    })
})
