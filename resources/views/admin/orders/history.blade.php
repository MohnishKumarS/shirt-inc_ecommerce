@extends('admin.adminlayout')

@section('content')
<div class="card">
 

    <div class="card-header">
        <h4>Completed Orders <i class="material-icons opacity-10">history</i>
        <a href="{{ url('/orders')}}" class="fs-6 float-end text-primary">New Order</a>
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
                        <th>Tracking No </th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
    
                    @forelse ($orders as $val)
    
                    <tr>
                        <td>{{  date('d-M-Y' , strtotime($val->created_at)) }}</td>
                        <td>{{$val->tracking_no}}</td>
                        <td>{{$val->total_price}}</td>
                        <td><label for="" class="badge bg-success">{{$val->status == '4' ? 'Completed' : ""}}</label></td>
                        <td>
                            <a href="{{url('order/'.$val->id)}}" class="btn btn-primary btn-sm">View order </a>
                        </td>
                    </tr>

                    @empty

                    <tr >
                        <td colspan="5" class="text-center">
                            <div class="py-5">
                                No completed orders available at the moment.....
                            </div>
                        </td>
                    </tr>

                    @endforelse
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection