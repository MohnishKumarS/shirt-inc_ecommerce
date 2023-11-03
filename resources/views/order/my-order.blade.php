@extends('layouts.userpage')

@section('title','my-orders')

@section('content')
<div class="container">
    <div class="card shadow my-5">
        <div class="card-header">
            <h3>My Orders <span> <i class="fa-solid fa-gift fs-4"></i></span> </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
              
                    @if ($order->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <tr>
                                <th>Order date</th>
                                <th>Order Id </th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($order as $val)

                            <tr class="align-middle">
                                <td>{{ $val->created_at->format('d-M-Y')}}</td>
                                {{-- <td>{{  date('d-M-Y' , strtotime($val->created_at)) }}</td> --}}
                                <td>{{$val->tracking_no}}</td>
                                <td>Rs: {{$val->total_price}}</td>
                                <td>
                              <div>
                                @switch($val->status)
                                @case(1)
                                <span class="badge text-bg-primary">Order Confirm</span>
                               
                                    @break
                                @case(2)
                                <span class="badge text-bg-info">In progress</span>
                               
                                    @break
                                @case(3)
                                <span class="badge text-bg-warning">Out for Delivery</span>
                               
                                    @break
                                @case(4)
                                <span class="badge text-bg-success">Delivered</span>
                                
                                    @break
                                    
                                @default
                                <span class="badge text-bg-danger">Pending</span>
                            @endswitch
                              </div>

                               {{-- --- admin -- message --}}
                               @if ($val->message)
                                   <div class="text-sm text-normal">
                                  <span><i class="fa-regular fa-comment-dots me-1 fa-lg"></i></span>  {{$val->message}}
                                   </div>
                               @endif
                                </td>
                                <td>
                                    <a href="{{url('view-order/'.$val->id)}}" class="btn-glow p-2">View order </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        {{-- -------- pagination ---------- --}}
                        <div class="paginate-pro mt-5 text-end">
                           {{ $order->links() }}
                        </div>
                    </div>
                    @else
                    {{-- ---- empty orders list ---- --}}
                    <div class="" style="padding: 0px 0 40px">
                        <div class="text-center">
                            <img src="{{asset('image/empty/emp-4.webp')}}" alt="orders-empty" class="img-fluid">
                            <h3>Sorry, You have no<span class="title-hlorg"> Order!</span></h3>
                            <p class="text-sm text-normal">Go find the product you like. Looks like you haven't made your choice yet... </p>
                            <div class="mt-4">
                                <a href="{{ url('/collections') }}" class="btn-float d-inline-block"> <i
                                        class="fa-solid fa-bag-shopping me-1"></i> Go Shopping....</a>
                            </div>
                        </div>
                    </div>

                    @endif







                </div>
            </div>
        </div>
    </div>


</div>


@endsection
