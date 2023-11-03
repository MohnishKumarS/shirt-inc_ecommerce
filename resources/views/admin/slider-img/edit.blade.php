@extends('admin.adminlayout')

@section('content')
<div class="card pb-5">


    <div class="card-header">
        <h4>Edit Slider Poster  <i class="material-icons opacity-10">post_add</i></h4>
    </div>
    <div class="card-body">
       <div class="add-slider">
           <form action="{{url('update-slider/'.$slider->id)}}" method="post" enctype="multipart/form-data"> 
            @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Current Poster Image</label>
                        <div>
                            <img src="{{asset('image/slider/'.$slider->image)}}" alt="" class="img-fluid" width="400">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Add Poster Image :</label>
                        <input type="file" class="form-control"  name="image">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label for="" class="form-label">Timer :</label>
                        <select class="form-select" name="timer" required>
                            <option selected value="">Choose a seconds</option>
                            <option value="3000" @if($slider->timer == '3000') selected @endif>3 seconds</option>
                            <option value="4000" @if($slider->timer == '4000') selected @endif>4 seconds</option>
                            <option value="5000" @if($slider->timer == '5000') selected @endif>5 seconds</option>
                            <option value="6000" @if($slider->timer == '6000') selected @endif>6 seconds</option>
                          </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="" class="form-label">First showing Poster :</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="active" @if($slider->active) checked @endif>
                                <label class="form-check-label" >Active</label>
                              </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3  mt-3">
                        <button class="btn btn-primary  w-50 d-block mx-auto" type="submit">Submit</button>
                    </div>
                </div>
           </form>
       </div>
    </div>


</div>
@endsection