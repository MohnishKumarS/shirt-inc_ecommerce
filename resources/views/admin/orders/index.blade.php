@extends('admin.adminlayout')

@section('content')
<div class="card">

    <div class="card-header">
        
        <h4>Orders <i class="material-icons opacity-10">reviews</i>
        <a href="{{ url('order-history')}}" class="fs-6 float-end text-primary">Order History</a>
    </h4>
    </div>
 
    <div class="card-body">

        {{-- --- filter search --- --}}
        <div class="mb-4">
            <form action="{{URL::current()}}" method="GET">
                <div class="row">
                    <div class="col-md-2">
                        <label >Filter by Date</label>
                        <input type="date" name="date"  class="form-control" value="{{Request::get('date') ?? ''}}">
                    </div>
                    <div class="col-md-2">
                        <label >Filter by Month</label>
                        <input type="month" name="month"  class="form-control" value="{{Request::get('month') ?? ''}}" >
                    </div>
                    <div class="col-md-2">
                        <label >Filter by status </label>
                        <select class="form-select" name="status">
                            <option selected value="">Choose status</option>
                            <option value="0" {{Request::get('status') == '0' ? 'selected' : ''}}>Pending</option>
                            <option value="1" {{Request::get('status') == '1' ? 'selected' : ''}}>Order Confirm</option>
                            <option value="2" {{Request::get('status') == '2' ? 'selected' : ''}}>In progress</option>
                            <option value="3" {{Request::get('status') == '3' ? 'selected' : ''}}>Out for Delivery</option>
                          </select>
                    </div>
                    <div class="col-md-2">
                        <label >Filter by Order id</label>
                        <input type="text" name="order_id"  class="form-control" value="{{Request::get('order_id') ?? ''}}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-secondary mt-4">Filter</button>
                    </div>
                </div>
            </form>
        </div>




        <div class="row">
            <div class="col">
             <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Order date</th>
                        <th>Order Id </th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
    
                    @forelse ($orders as $val)
    
                    <tr>
                        <td>{{  date('d-M-Y' , strtotime($val->created_at)) }}</td>
                        <td>{{$val->tracking_no}}</td>
                        <td>{{$val->total_price}}</td>
                        <td>
                            @switch($val->status)
                            @case(1)
                            <span class="badge text-bg-primary">Order Confirm</span>
                           
                                @break
                            @case(2)
                            <span class="badge text-bg-info">In Progress</span>
                           
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
                        </td>
                        <td>
                            <a href="{{url('order/'.$val->id)}}" class="btn btn-primary btn-sm">View order </a>
                        </td>
                    </tr>
                    @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            <div class="py-5">
                                No Order Available....
                            </div>
                            
                        </td>
                    </tr>
                    
                    @endforelse
                </table>
             </div>
            
                {{-- --------- paginate ----------- --}}
                <div class="text-center mt-5">
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection