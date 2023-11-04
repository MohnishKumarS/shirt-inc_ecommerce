@extends('admin.adminlayout')

@section('content')
    <div class="card">


        <div class="card-header">
            <h4>Registered Users <i class="material-icons opacity-10 ms-1">group</i>
               
            </h4>
        </div>

        <div class="card-body">

              {{-- --- filter search --- --}}
        <div class="mb-4">
            <form action="{{URL::current()}}" method="GET">
                <div class="row">
                    <div class="col-md-2">
                        <label >Filter by Email</label>
                        <input type="text" name="email"  class="form-control" value="{{Request::get('email') ?? ''}}">
                    </div>
                    <div class="col-md-2">
                        <label >Filter by most purchased user</label>
                        <input type="text" name="order_item"  class="form-control" value="{{Request::get('order_item') ?? ''}}">
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
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Orders</th>
                                <th>Logged</th>
                                <th>Action</th>

                            </tr>

                            @if (count($user) > 0)
                                @php
                                    $i = 1;
                                   
                                @endphp
                                @foreach ($user as $val)
                                
                                    <tr class="align-middle">
                                        <td>{{ $i++ }}  </td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ $val->mobile }}</td>
                                        <td>
                                            @if ($val->orders)
                                              {{count($val->orders)}}  
                                            @endif
                                        </td>
                                        <td>{{ $val->created_at->format('d-M-Y') }}</td>

                                        <td>
                                            <a href="{{ url('user/' . $val->id) }}" class="btn btn-primary btn-sm">View
                                                User</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <div class="text-danger my-5 text-center">
                                            No user Found !
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    {{-- --------- paginate ----------- --}}
                    <div class="text-center my-5">
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
