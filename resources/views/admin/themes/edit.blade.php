@extends('admin.adminlayout')

@section('content')
<div class="card pb-5">


    <div class="card-header">
        <h4>Edit Themes  <i class="material-icons opacity-10">post_add</i></h4>
    </div>
    <div class="card-body">
       <div class="add-slider">
           <form action="{{url('update-theme/'.$theme->id)}}" method="post" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Name:</label>
                        <input type="text" class="form-control"  name="themes" value="{{$theme->name}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Slug:</label>
                        <input type="text" class="form-control"  name="slug" value="{{$theme->slug}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Current Image:</label>
                        <div>
                          <img src="{{ asset('image/themes/'.$theme->image)}}" alt="" width="200" style="object-fit: contain">
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Choose another image:</label>
                        <input type="file" class="form-control"  name="image" required>
                    </div>
                   
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Status :</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="active" >
                                <label class="form-check-label" >Active</label>
                              </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3  mt-3">
                        <button class="btn btn-primary  w-25 d-block mx-auto" type="submit">Update</button>
                    </div>
                </div>
           </form>
       </div>
    </div>

</div>
@endsection