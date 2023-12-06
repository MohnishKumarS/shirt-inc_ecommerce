@extends('admin.adminlayout')

@section('content')
<div class="card pb-5">


    <div class="card-header">
        <h4>Edit Ads Poster  <i class="material-icons opacity-10">post_add</i></h4>
    </div>
    <div class="card-body">
       <div class="add-slider">
           <form action="{{url('update-poster/'.$poster->id)}}" method="post" enctype="multipart/form-data"> 
            @csrf
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$poster->title}}">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Description</label>
                    <input type="text" name="desc" class="form-control" value="{{$poster->desc}}">
                  </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Current Poster Image</label>
                        <div>
                            <img src="{{asset('image/Ads-poster/'.$poster->image)}}" alt="ads-poster" class="img-fluid" width="400">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Add Poster Image :</label>
                        <input type="file" class="form-control"  name="image">
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Current Status:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="active" @if($poster->active) checked @endif>
                                <label class="form-check-label" >Active</label>
                              </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3  mt-4">
                        <button class="btn btn-primary  w-50 d-block mx-auto" type="submit">Submit</button>
                    </div>
                </div>
           </form>
       </div>
    </div>


</div>
@endsection