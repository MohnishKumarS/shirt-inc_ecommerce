<main>
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
        <h2 class="page-title">Shipping and Checkout</h2>
        <?php include './layouts/cart-topbar.php'; ?>
        <form name="checkout-form" action="./shop_order_complete.html">
            <div class="checkout-form">
                <div class="billing-info__wrapper">
                    <h4>BILLING DETAILS</h4>
                    <div class="row">
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
                    </div>
                </div>
                <div class="checkout__totals-wrapper">
                    <div class="sticky-content">
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
                                <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method" id="checkout_payment_method_1">
                                <label class="form-check-label" for="checkout_payment_method_1">
                                    Cash on delivery
                                    <span class="option-detail d-block">
                                        Extra Rs.150
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method" id="checkout_payment_method_2">
                                <label class="form-check-label" for="checkout_payment_method_2">
                                    Phonepe
                                </label>
                            </div>
                            <div class="policy-text">
                                Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="<?= $url ?>privacy-policy" target="_blank">privacy policy</a>.
                            </div>
                        </div>
                        <a href="<?= $url ?>confirm" class="btn btn-primary btn-checkout">PLACE ORDER</a>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>