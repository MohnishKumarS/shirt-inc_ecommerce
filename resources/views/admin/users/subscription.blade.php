@extends('admin.adminlayout')

@section('content')
    <div class="card">


        <div class="card-header">
            <h4>Users Subscription<i class="material-icons opacity-10 ms-1">group</i>
               
            </h4>
        </div>

        <div class="card-body">

    


            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <tr>
                                <th >id</th>
                                <th >Email</th>
                                <th >Submitted</th>

                            </tr>

                            @if (count($sub) > 0)
                                @php
                                    $i = 1;
                                   
                                @endphp
                                @foreach ($sub as $val)
                                
                                    <tr class="align-middle">
                                        <td>{{ $i++ }}  </td>
                                        <td>{{ $val->email }}</td>
                                    
                                        <td>{{ $val->created_at->format('d-M-Y') }}</td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">
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
                        {{ $sub->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
