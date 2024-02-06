@extends('layouts.userpage')

@section('title', 'Profile')

@section('content')

    <!-- ----------------- Account profile  - page ---------------- -->
    @php
        $active = 'account';
    @endphp
    <main>
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Account</h2>
            <div class="row">

                {{-- ------ acount -- side bar --------- --}}
                <div class="col-lg-3">
                    <ul class="account-nav">
                        <li>
                            <a href="<?= $url ?>profile/orders"
                                class="menu-link menu-link_us-s<?= $active === 'order' ? ' menu-link_active' : '' ?>">Orders</a>
                        </li>
                        <li>
                            <a href="<?= $url ?>profile/address"
                                class="menu-link menu-link_us-s<?= $active === 'address' ? ' menu-link_active' : '' ?>">Addresses</a>
                        </li>
                        <li>
                            <a href="<?= $url ?>profile/account"
                                class="menu-link menu-link_us-s<?= $active === 'account' ? ' menu-link_active' : '' ?>">Account
                                Details</a>
                        </li>
                        <li>
                            <a href="<?= $url ?>profile/wishlist"
                                class="menu-link menu-link_us-s<?= $active === 'wishlist' ? ' menu-link_active' : '' ?>">Wishlist</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" class="menu-link menu-link_us-s"
                                onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </ul>
                </div>

                {{-- - -- end account side bar ----- --}}

                <div class="col-lg-9">
                    <div class="page-content my-account__edit">
                        <div class="my-account__edit-form">
                            <form name="account_edit_form" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" id="account_first_name"
                                                placeholder="First Name" required>
                                            <label for="account_first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" id="account_last_name"
                                                placeholder="Last Name" required>
                                            <label for="account_last_name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" id="account_display_name"
                                                placeholder="Display Name" required>
                                            <label for="account_display_name">Display Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="email" class="form-control" id="account_email"
                                                placeholder="Email Address" required>
                                            <label for="account_email">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <h5 class="text-uppercase mb-0">Password Change</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="password" class="form-control" id="account_current_password"
                                                placeholder="Current password" required>
                                            <label for="account_current_password">Current password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="password" class="form-control" id="account_new_password"
                                                placeholder="New password" required>
                                            <label for="account_new_password">New password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="password" class="form-control" data-cf-pwd="#account_new_password"
                                                id="account_confirm_password" placeholder="Confirm new password" required>
                                            <label for="account_confirm_password">Confirm new password</label>
                                            <div class="invalid-feedback">Passwords did not match!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <button class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


@endsection
