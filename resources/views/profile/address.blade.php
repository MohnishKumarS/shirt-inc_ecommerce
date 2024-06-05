@extends('layouts.userpage')

@section('title', 'Profile')

@section('content')

    <!-- ----------------- Account profile  - page ---------------- -->
    @php
        $active = 'address';
    @endphp
  <main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Addresses</h2>
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
          <div class="page-content my-account__address">
            <p class="notice">The following addresses will be used on the checkout page by default.</p>
            <h5>Shipping Address</h5>
            <div class="my-account__address-list">
              
              @if (count($addr) > 0)
                  @foreach ($addr as $item)
                  <div class="my-account__address-item">
                    {{-- <div class="my-account__address-item__title">
                    
                      <a href="#">Edit</a>
                    </div> --}}
                    <div class="my-account__address-item__detail">
                      <p class="my-account__address-item__title">{{$item->full_name}}</p>
                      <p>{{ $item->address }} , {{$item->city}}</p>
                      <p>{{$item->state}} - {{ $item->pincode }}</p>
                      <br>
                      <p>{{Auth::user()->email}}</p>
                      <p>{{$item->phone}}</p>
                    </div>
                  </div>
                  @endforeach
              @else
              <p>No Address found!</p>
              @endif

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


@endsection
