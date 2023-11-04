@extends('admin.adminlayout')
@section('content')


<div class="card">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>
    <div class="card-body">
        <form action="/update-category/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$data->name}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Slug name</label>
                    <input type="text" class="form-control" name="slug" value="{{$data->slug}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="form-label">Description</label>
                    <input type="text" class="form-control" name="desc" value="{{$data->desc}}">
                </div>
               
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Current Image</label>
                    <div>
                        <img src="{{ asset('image/category/'.$data->image)}}" alt="" width="200" style="object-fit: contain">
                    </div>
                  
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Current Poster</label>
                    <div>
                        @if ($data->poster)
                        <img src="{{ asset('image/category/'.$data->poster)}}" alt="" class="img-fluid" height="130" style="object-fit: contain">
                        @else
                         <div class="text-danger">
                            No poster image selected
                         </div>
                        @endif
                        
                    </div>
                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Choose another image</label>
                    <input type="file" class="form-control" name="images" value="{{$data->image}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Choose another Poster</label>
                    <input type="file" class="form-control" name="poster" value="{{$data->name}}">
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="" class="form-label">Action</label>
                       </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="status" {{$data->status == '1'? 'checked' : ''}}>
                            <label class="form-check-label" >Status header</label>
                          </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="popular" {{$data->popular == '1'? 'checked' : ''}}>
                            <label class="form-check-label" >Popular</label>
                          </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{$data->meta_title}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Meta Keyword</label>
                    <input type="text" class="form-control" name="meta_keywords" value="{{$data->meta_keywords}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Meta Description</label>
                    <input type="text" class="form-control" name="meta_desc" value="{{$data->meta_desc}}">
                </div>

                <div class="col-md-12 mb-3  mt-3">
                    <button class="btn btn-primary  w-50 d-block mx-auto" type="submit">Submit</button>
                </div>

            </div>
        </form>
    </div>


    {{-- ----all products ------------- --}}
    <div class="card-header">
        <h4>All Products</h4>
    </div>

   <div class="card-body">       

    <div class="table-responsive-lg">
        <table class="table table-striped table-sm table-bordered text-center">
            <tr>
                <th style="width:5%">Id</th>
                <th style="width:15%">Image</th>
                <th style="width:25%">Name</th>
                <th style="width:10%">type</th>
                <th style="width:10%">Quantity</th>
                <th style="width:15%">Price</th>
                <th style="width:20%">Action</th>
            </tr>
            @php
                $i = 1; 
            @endphp
            @foreach ($data->products as $val)
                @php
                     $img = explode(',',$val->image);
                @endphp
                <tr class="align-middle">
                    <td>{{$i++}}</td>
                    <td><img src="{{asset('/image/product/'.$img[0])}}" alt="" width="120" height="150" style="object-fit: cover"></td>
                    <td>{{$val->name}}</td>
                    <td>{{$val->type}}</td>
                    <td class="text-break">{{$val->quantity}}</td>
                    <td >₹ {{$val->selling_price}}  <s> <small>₹{{$val->original_price}}</small></s></td>
                    <td>
                        <a href="{{ url('edit-product/'.$val->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ url('delete-product/'.$val->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete it');">Delete</a>
                    </td>
                    
                </tr>
            @endforeach

           
        </table>
       
   </div>



</div>
    
@endsection