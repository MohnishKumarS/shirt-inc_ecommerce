@extends('layouts.userpage')

@section('title', 'Profile')

@section('content')

    <!-- ----------------- Account profile  - page ---------------- -->
    @php
        $active = 'order';
    @endphp
  <main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Orders</h2>
      <div class="row">
          {{-- ------ acount -- side bar --------- --}}
          <div class="col-lg-3">
            <ul class="account-nav">
                <li>
                    <a href="<?= $url ?>profile/orders" class="menu-link menu-link_us-s<?= $active === "order" ? " menu-link_active" : "" ?>">Orders</a>
                </li>
                <li>
                    <a href="<?= $url ?>profile/address" class="menu-link menu-link_us-s<?= $active === "address" ? " menu-link_active" : "" ?>">Addresses</a>
                </li>
                <li>
                    <a href="<?= $url ?>profile/account" class="menu-link menu-link_us-s<?= $active === "account" ? " menu-link_active" : "" ?>">Account Details</a>
                </li>
                <li>
                    <a href="<?= $url ?>profile/wishlist" class="menu-link menu-link_us-s<?= $active === "wishlist" ? " menu-link_active" : "" ?>">Wishlist</a>
                </li>
                <li>
                  <a href="{{ route('logout') }}" class="menu-link menu-link_us-s"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                class="d-none">
                @csrf
                 </form>
            </ul>
        </div>

        {{-- - -- end account side bar ----- --}}
        <div class="col-lg-9">
          <div class="page-content my-account__orders-list">
            <table class="orders-table">
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Total</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#2416</td>
                  <td>October 1, 2023</td>
                  <td>On hold</td>
                  <td>Rs.1,200.65 for 3 items</td>
                  <td><button class="btn btn-primary">VIEW</button></td>
                </tr>
                <tr>
                  <td>#2417</td>
                  <td>October 2, 2023</td>
                  <td>On hold</td>
                  <td>Rs.1,200.65 for 3 items</td>
                  <td><button class="btn btn-primary">VIEW</button></td>
                </tr>
                <tr>
                  <td>#2418</td>
                  <td>October 3, 2023</td>
                  <td>On hold</td>
                  <td>Rs.1,200.65 for 3 items</td>
                  <td><button class="btn btn-primary">VIEW</button></td>
                </tr>
                <tr>
                  <td>#2419</td>
                  <td>October 4, 2023</td>
                  <td>On hold</td>
                  <td>Rs.1,200.65 for 3 items</td>
                  <td><button class="btn btn-primary">VIEW</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>

  <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


@endsection
