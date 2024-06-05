@extends('admin.adminlayout')

@section('content')


    <div class="card">
        <div class="card-header">

            <h4>Deleted Products <i class="material-icons opacity-10">select_all</i></h4>

        </div>
        <div class="card-body">

            <div class="table-responsive-lg">
                <table class="table table-striped table-sm table-bordered text-center">
                    <tr>
                        <th style="width:5%">Id</th>
                        <th style="width:10%">Image</th>
                        <th style="width:10%">Category</th>
                        <th style="width:15%">Name</th>
                        <th style="width:5%">Trending</th>
                        <th style="width:10%">Price</th>
                        <th style="width:20%">Action</th>
                    </tr>

                    @if (count($product) > 0)
                        {{-- check if product is available or not ----- --}}
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($product as $val)
                            @php
                                $img = explode(',', $val->image);
                               
                            @endphp
                            <tr class="align-middle">
   
                                <td>{{ $i++ }}</td>
                                <td>
                                    @if ($val->designType)
                                    <img src="{{ asset('/image/product/design/' . $val->design) }}" alt="product-design" width="100" height="150" style="object-fit: contain">
                                    @else
                                    <img src="{{ asset('/image/product/' . $img[0]) }}" alt="product-image" width="100" height="150" style="object-fit: contain">
                                    @endif
                                </td>
                                {{-- <td>{{ $val->category->name }}</td> --}}
                                <td>{{ $val->name }}</td>

                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"
                                            {{ $val->trending == 1 ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>₹ {{ $val->selling_price }} <s> <small>₹{{ $val->original_price }}</small></s></td>
                                <td>
                                    <a href="{{ url('restore-product/' . $val->id) }}" class="btn btn-info">restore</a>
                                    <a href="{{ url('delete-permanent-product/' . $val->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete it');">Delete Forever</a>
                                </td>

                            </tr>
                        @endforeach
                      
                    @else
                        <tr>
                            <td colspan="7">
                                <div class="my-5 text-center text-danger">
                                    No Trash Products found.....
                                </div>
                            </td>
                        </tr>
                    @endif



                </table>

            </div>

            {{-- --------- paginate ----------- --}}
            <div class="text-center my-5">
                {{ $product->links() }}
            </div>
        </div>
    </div>

@endsection



