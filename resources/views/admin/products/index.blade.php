@extends('admin.adminlayout')

@section('content')


<div class="card">
    <div class="card-header">

        <h4>Product Page <i class="material-icons opacity-10">select_all</i></h4>
        
    </div>
    <div class="card-body">

               {{-- --- filter search --- --}}
               <div class="mb-4 ">
                <form action="{{URL::current()}}" method="GET">
                    <div class="row justify-content-start">
                        <div class="col-md-2">
                            <label>Filter by Category</label>
                            <select class="form-select" name="cat_id">
                                <option selected value="">Choose a category</option>
                                @forelse ($cat_list as $item)
                                <option  value="{{$item->id}}"  {{Request::get('cat_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @empty
                                <option  value="">No category found</option>
                                @endforelse
                              </select>
                        </div>
                        <div class="col-md-2">
                            <label>Filter by action</label>
                            <select class="form-select" name="action">
                                <option selected value="">Choose a status</option>
                                <option  value="status" {{Request::get('action') == 'status' ? 'selected' : ''}}>Popular</option>
                                <option  value="trending" {{Request::get('action') == 'trending' ? 'selected' : ''}}>trending</option>
                                <option  value="freq_bought" {{Request::get('action') == 'freq_bought' ? 'selected' : ''}}>frequent bought</option>
                               
                              </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-secondary mt-4">Filter</button>
                        </div>
                    </div>
                </form>
            </div>


        <div class="table-responsive-lg">
        <table class="table table-striped table-sm table-bordered text-center">
            <tr>
                <th style="width:5%">Id</th>
                <th style="width:10%">Image</th>
                <th style="width:10%">Category</th>
                <th style="width:15%">Name</th>
                <th style="width:5%">Trending</th>
                {{-- <th style="width:5%">Popular</th> --}}
                <th style="width:10%">Price</th>
                <th style="width:20%">Action</th>
            </tr>

            @if (count($product) > 0)
                    {{--check if product is available or not ----- --}}
                    @php
                    $i = 1; 
                  
                @endphp
                @foreach ($product as $val)
                    @php
                         $img = explode(',',$val->image);
                    @endphp
                    <tr class="align-middle ">
                        <td>{{$i++}}</td>
                        <td><img src="{{asset('/image/product/'.$img[0])}}" alt="" width="100" height="150" style="object-fit: contain"></td>
                        <td>{{$val->category->slug}}</td>
                        <td>{{$val->name}}</td>
                       
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" {{$val->trending == 1 ? 'checked' : ''}} disabled>
                              </div>
                        </td>
                        <td >₹ {{$val->selling_price}}  <s> <small>₹{{$val->original_price}}</small></s></td>
                        <td>
                            <a href="{{ url('edit-product/'.$val->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ url('delete-product/'.$val->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete it');">Delete</a>
                        </td>
                        
                    </tr>
                @endforeach

              
                @else

                <tr>
                    <td colspan="7">
                        <div class="my-5 text-center text-danger">
                            No Products found.....
                        </div>
                    </td>
                </tr>


            @endif
       

           
        </table>
       
    </div>

    {{-- --------- paginate ----------- --}}
    <div class="text-center my-5">
        {{$product->links()}}
    </div>
    </div>
</div>

@endsection