@extends('layouts.userpage')

@section('title','order-success')

@section('content')
<div class="container">
    
    {{-- --- after successsful payment redirect to this page  --}}

    <div class="bg-white" style="padding: 80px 0 150px ">
      <div class="text-center">
          <img src="{{asset('image/empty/payment-success.gif')}}" alt="orders-success" class="img-fluid" width="400" loading="lazy">
          <h3>Your Payment is<span class="title-hlorg"> Successful !</span></h3>
          <p class="text-sm text-normal">We are delighted to inform you that we received your payments ... </p>
          <div class="mt-4">
              <a href="{{ url('/my-order') }}" class="btn-float d-inline-block"> <i
                      class="fa-solid fa-bag-shopping me-1"></i> View Orders ....</a>
          </div>
      </div>
  </div>


</div>


@endsection
