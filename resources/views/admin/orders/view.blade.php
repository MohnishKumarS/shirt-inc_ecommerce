@extends('admin.adminlayout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>New Orders <i class="material-icons opacity-10">list_alt</i></h4>
        </div>

        <div class="card-body">


            <div class="row">
                <div class="col-6">
                    <div>
                        {{-- ----------- order delivered ------------- --}}
                        @if ($order->status == '4')
                            <h3 class="my-2"> <span class="text-success "><i class="fa-solid fa-square-check"></i> Delivered
                                    {{ $order->updated_at->format('d-M-Y') }}</span></h3>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        {{-- ------------ invoice generate ---------- --}}
                        <div class="text-end">
                            <h6 class="pe-4">Invoice:</h6>
                            <a href="{{ url('invoice/' . $order->id) }}" class="btn-warning btn p-2" target="_blank"
                                title="view invoice"> <i class="material-icons">visibility</i> </a>
                            <a href="{{ url('invoice/' . $order->id . '/download') }}" class="btn-danger btn ms-3 p-2"
                                title="download invoice"> <i class="material-icons">downloading</i> </a>
                            <a href="{{ url('invoice/' . $order->id . '/mail') }}" class="btn-danger btn ms-3 p-2"
                                title="send invoice via mail"> <i class="material-icons">forward_to_inbox</i> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <h5>Order Details</h5>
                    <hr>

                    <div>
                        <p class="fw-bold">OrderNo : <span class="text-dark">#{{ $order->id }}</span></p>
                        <p class="fw-bold">OrderId : <span class="text-dark">{{ $order->tracking_no }}</span></p>
                        <p class="fw-bold">Order Placed : <span class="text-dark">{{ $order->created_at->format('d-M-Y') }}</span></p>
                        <p class="fw-bold">Payment Mode : <span class="text-dark">{{ $order->payment_mode }}</span></p>
                    </div>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                        
                        @foreach ($order->orderitem as $item)
                            @php
                                $img = explode(',', $item->product->image);
                            @endphp
                            <tr class="align-middle">
                                <td>
                                    <img src="{{ asset('image/product/' . $img[0]) }}" alt="product-image" width="80"
                                        loading="lazy">
                                </td>
                                <td>{{ $item->product->name }} <br>
                                    @if ($item->mens_size)
                                        <small>(size for men : {{ $item->mens_size }} &
                                            women : {{ $item->womens_size }})</small>
                                    @else
                                        <small>(size : {{ $item->size }})</small>
                                    @endif
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->quantity * $item->price }}</td>

                            </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="3" class="text-start">Grand Total :</td>
                            <td>{{ $order->total_price }}</td>
                        </tr>



                    </table>
                </div>
                <div class="col-lg-4">
                    <h5>Shipping Details</h5>
                    <hr>

                    <div>
                        <address>
                            <p class="fw-bold">Delivery Address :</p>

                            <h6 class="mb-2">{{ $order->address->full_name }}</h6>
                            <p class=""><i class="fa-solid fa-location-dot me-2"></i>
                                {{ $order->address->address }}, @if ($order->address->landmark)
                                    {{ $order->address->landmark . ',' }}
                                @endif
                                <br>
                                {{ $order->address->city }} , {{ $order->address->state }} -
                                {{ $order->address->pincode }}. <br>
                                <i class="fa-solid fa-phone me-2 mt-2"></i>{{ $order->address->phone }}. <br>
                                @if ($order->address->delivery_instr)
                                    <i class="fa-solid fa-bookmark me-2 mt-2"></i>{{ $order->address->delivery_instr }}
                                @endif

                            </p>
                        </address>

                        <div>
                            <p class="fw-bold">User details :</p>
                            <p><i class="fa-solid fa-user me-2 "></i> <span class="fw-bold text-dark">{{ $order->user->name }}</span></p>
                            <p><i class="fa-solid fa-envelope-circle-check me-2  "></i> <span class="fw-bold text-dark">{{ $order->user->email }}</span></p>
                            <p><i class="fa-solid fa-phone me-2 "></i> <span class="fw-bold text-dark">{{ $order->user->mobile }}</span></p>
                        </div>
                    </div>



                    <div>
                        <form action="{{ url('update-order-status/' . $order->id) }}" method="post">
                            @method('put')
                            @csrf


                            <div class="mt-3">
                                <p class="fw-bold">Delivery status :</p>
                                <select class="form-select" name="order_status" required>
                                    <option selected value="">Choose one</option>
                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Order Confirmed
                                    </option>
                                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>In progress</option>
                                    <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Out For Delivery
                                    </option>
                                    <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Delivered</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <p class="fw-bold">Add message/Instruction</p>
                                <textarea class="form-control" name="order_message" rows="2">
                                    @if ($order->message)
                                    {{ $order->message }}
                                    @endif
                                </textarea>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            </div>
                        </form>
                    </div>

                    {{-- ----- refund api ---- --}}

                    {{-- <div>
                        <form action="{{ url('/payment-refund') }}" method="post">
                            @csrf
                            <div>
                                <label class="form-label">merchantTransactionId</label>
                                <input type="text" class="form-control" name="trans_Id" required>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </div>
                        </form>
                    </div> --}}


                </div>
            </div>
        </div>
    </div>
@endsection
