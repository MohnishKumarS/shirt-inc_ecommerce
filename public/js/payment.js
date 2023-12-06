$(document).ready(function () {
    // ------------ payment btn click events -------------


    $('.payment-btn').on('click', function (e) {
        // console.log(e.target);
        $addr = $('input[type="radio"][name="select_address"]:checked').val();

        if ($addr) {
            const addr_id = $addr;
            // Update the href attribute of the anchor tag with the new value
            $(this).attr('href', "payment-method/"+ addr_id);
            // return false;

        } else {
            $.Toast("Oops!", "Choose a shipping address to continue", "error", {
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
            
            return false;
        }









    })
})
