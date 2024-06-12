@extends('layouts.userpage')

@section('title', 'Orders')

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

            @if ($order->count() > 0)
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

                @foreach ($order as $val)
                <tr>
                  <td>{{ $val->tracking_no }}</td>
                  <td>{{ $val->created_at->format('M d,Y') }}</td>
                  <td>
                    <div>
                      @switch($val->status)
                          @case(1)
                              <span class="text-primary">Order Confirm</span>
                          @break

                          @case(2)
                              <span class="text-info">In progress</span>
                          @break

                          @case(3)
                              <span class="text-warning">Out for Delivery</span>
                          @break

                          @case(4)
                              <span class="text-success">Delivered</span>
                          @break

                          @default
                              <span class="text-danger">Pending</span>
                      @endswitch
                  </div>

                     {{-- --- admin -- message --}}
                     @if ($val->message)
                     <div class="text-sm text-normal">
                         <span><i
                                 class="fa-regular fa-comment-dots me-1 fa-lg"></i></span>
                         {{ $val->message }}
                     </div>
                 @endif

                  </td>
                  <td>Rs.{{ $val->total_price }} for {{$val->orderitem->count()}} items</td>
                  <td><a href="{{ url('view-order/' . $val->id) }}" class="btn btn-primary">VIEW</a></td>
                </tr>
                @endforeach
             
           
              </tbody>
            </table>

            {{-- -------- pagination ---------- --}}
            <div class="paginate-pro mt-5 text-end">
              {{ $order->links() }}
          </div>
            @else
                  {{-- ---- empty orders list ---- --}}
                  <div class="" style="padding: 0px 0 40px">
                    <div class="text-center">
                        <img src="{{ asset('image/empty/no-orders.webp') }}" alt="orders-empty"
                            class="img-fluid">
                        <h3>Sorry, You have no<span class="title-hlorg"> Order!</span></h3>
                        <p class="text-sm text-normal">Go find the product you like. Looks like you haven't
                            made your choice yet... </p>
                        <div class="mt-4">
                            <a href="{{ url('/collections') }}" class="btn btn-primary"> <i
                                    class="fa-solid fa-bag-shopping me-1"></i> Go to Shop</a>
                        </div>
                    </div>
                </div>
            @endif
         
          </div>
        </div>
      </div>
    </section>
  </main>

  <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


@endsection
