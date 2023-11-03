@extends('admin.adminlayout')

@section('content')
<div class="card">
 

    <div class="card-header">
        <h4> User Details<i class="material-icons opacity-10 ms-1">account_circle</i>
            <a href="{{ url('/users')}}" class="fs-6 float-end text-primary"><i class="material-icons opacity-10 me-1" style="vertical-align: middle">
                backspace
            </i> Back</a>
    </h4>
    </div>
    @php
     if($addr){
        $addr = $addr->address . ', ' . $addr->city .', '. $addr->state .' - ' . $addr->pincode;
     }else{
        $addr = "User address not found.....";
     }  
    @endphp
    <div class="card-body">
        <div class="row">
          <div class="col-5">
                <div class=" mb-3">
                        <form action="{{url('user-role/'.$view->id)}}" method="post">
                                @csrf
                        <label for="" class="form-label">Role </label>
                        
                        <select class="form-select" name="role_s">
                            <option selected>Choose one</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                          
                          </select>
                          <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                </div>
                <div class=" mb-3">
                        <label for="" class="form-label">Username </label>
                        <input type="text" value="{{$view->name}}" class="form-control" disabled>
                </div>
                <div class=" mb-3">
                        <label for="" class="form-label">Email </label>
                        <input type="text" value="{{$view->email}}" class="form-control" disabled>
                </div>
                <div class=" mb-3">
                        <label for="" class="form-label">Mobile </label>
                        <input type="text" value="{{$view->mobile}}" class="form-control" disabled>
                </div>
                <div class=" mb-3">
                        <label for="" class="form-label">Address </label>
                        <input type="text" value="{{$addr}}" class="form-control" disabled>
                </div>
                <div class=" mb-3">
                        <label for="" class="form-label">Product Purchased </label>
                        <input type="text" value="{{count($view->orders)}}" class="form-control" disabled>
                </div>
          </div>
        </div>
    </div>
</div>
@endsection