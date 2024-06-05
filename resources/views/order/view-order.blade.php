@extends('layouts.userpage')

@section('title', 'my-orders')

@section('content')

    <section >
        <div class="container py-5">
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-uppercase">View Order 
                        <div class="float-end">
                            <a href="javascript:void(0)" class="fs-6 text-primary" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                data-bs-title="We are here to help you! Follow us - support@shirt-inc.com / +91 6546456456">
                                Need help?
                            </a>
                        </div>
                    </h3>

                </div>

                <div class="card-body pb-5 mt-2">

                    <div class="row pb-3">
                        <div class="col-6">
                            <div>
                                {{-- ----------- order delivered ------------- --}}
                                @if ($order->status == '4')
                                    <h3 class="my-2"> <span class="text-success "><i class="fa-solid fa-square-check"></i>
                                            Delivered
                                            {{ $order->updated_at->format('d-M-Y') }}</span></h3>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                {{-- ------------ invoice generate ---------- --}}
                                <div class="text-end">
                                    <h6 class="text-md-b pe-5 pb-2">Invoice:</h6>
                                    <a href="{{ url('invoice/' . $order->id) }}" class="btn-warning btn px-4" target="_blank"
                                        title="view"><i class="fa-solid fa-eye"></i> </a>
                                    <a href="{{ url('invoice/' . $order->id . '/download') }}" class="btn-danger btn ms-3 px-4"
                                        title="download"><i class="fa-solid fa-download"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-8">
                            <h5>Order Details</h5>
                            <hr>
                            <div>
                                <h6 class="text-sm"><span class="pe-1">Order on <span
                                           >{{ $order->created_at->format('d-M-Y') }}</span></span>
                                    <span class="border-start  ps-2">Order Id - <span
                                            >{{ $order->tracking_no }}</span></span>
                                </h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>

                                    @foreach ($order->orderitem as $item)
                                        {{-- {{$item}} --}}
                                        @php
                                            $img = explode(',', $item->product->image);
                                        @endphp

                                        <tr class="align-middle">
                                            <td>
                                                <img src="{{ asset('image/product/' . $img[0]) }}" alt="product-image"
                                                    width="100" loading='lazy'>
                                            </td>
                                            <td>{{ $item->product->name }} <br>
                                                <span class="text-md-b">
                                                    @if ($item->mens_size)
                                                        <small>(size for men : {{ $item->mens_size }} &
                                                            women : {{ $item->womens_size }})</small>
                                                    @else
                                                        <small>(size : {{ $item->size }})</small>
                                                    @endif
                                                </span>
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>₹{{ $item->price * $item->quantity }}</td>

                                        </tr>
                                    @endforeach
                                    <tr class="fw-bold text-start">

                                        <td colspan="3">
                                            <div class="py-3">
                                                Grand Total :
                                            </div>
                                        </td>
                                        <td>
                                            <div class="py-3">
                                                ₹{{ $order->total_price }}
                                            </div>
                                        </td>

                                    </tr>



                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h5>Shipping Details</h5>
                            <hr>
                            @php
                                $est_date1 = date('l, M d', strtotime($order->created_at . '+5 days'));
                                $est_date2 = date('l, M d', strtotime($order->created_at . '+7 days'));
                            @endphp
                            <div>
                                <address>

                                    <div class="address-details">
                                        <h5 class="mb-2 text-uppercase">{{ $order->address->full_name }}</h5>
                                        <p class="text-capitalize"><i class="fa-solid fa-location-dot me-2"></i>
                                            {{ $order->address->address }}, @if ($order->address->landmark)
                                                {{ $order->address->landmark . ',' }}
                                            @endif
                                            <br>
                                            {{ $order->address->city }} , {{ $order->address->state }} -
                                            {{ $order->address->pincode }}. <br>
                                            <i class="fa-solid fa-phone me-2 mt-2"></i>{{ $order->address->phone }}<br>
                                            @if ($order->address->delivery_instr)
                                                <i
                                                    class="fa-solid fa-bookmark me-2 mt-2"></i>{{ $order->address->delivery_instr }}
                                            @endif

                                        </p>
                                    </div>

                                </address>
                            </div>

                            {{-- --- delivery date ---- --}}
                            <div>
                                <label class="mb-1">Estimated arrival on :</label>
                                <p > {{ $est_date1 . ' - ' . $est_date2 }}
                                </p>
                            </div>

                            {{-- --- payment ---- --}}
                            <div class="mt-3">
                                <label class=" mb-1">Payment Method :</label>
                                <p > {{ $order->payment_mode }}
                                </p>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection

@section('scripts')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endsection
