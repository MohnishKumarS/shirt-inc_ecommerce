@extends('admin.adminlayout')

@section('content')
<div class="card pb-5">


    <div class="card-header">
        <h4>Add Slider Poster  <i class="material-icons opacity-10">post_add</i></h4>
    </div>
    <div class="card-body">
       <div class="add-slider">
           <form action="{{url('/add-slider-image')}}" method="post" enctype="multipart/form-data"> 
            @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Add Poster Image :</label>
                        <input type="file" class="form-control"  name="image" required>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label for="" class="form-label">Timer :</label>
                        <select class="form-select" name="timer" required>
                            <option selected value="">Choose a seconds</option>
                            <option value="3000">3 seconds</option>
                            <option value="4000">4 seconds</option>
                            <option value="5000">5 seconds</option>
                            <option value="6000">6 seconds</option>
                          </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="" class="form-label">First showing Poster :</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="active" >
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


    <div class="card-header">
        <h4>Slider Poster  <i class="material-icons opacity-10">post_add</i></h4>
    </div>

    <div>
        <table class="table table-striped">
            <tr class="text-center">
                <th>Id</th>
                <th>Image</th>
                <th>Timer</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            @php
            $i = 1; 
        @endphp

        @foreach ($slider as $val)
            <tr  class="align-middle text-center">
                <td>{{$i++}}</td>
                <td>
                    <img src="{{asset('image/slider/'.$val->image)}}" width="400" height='200' style="object-fit: contain" alt="slider-poster">
                </td>
                <td>{{$val->timer}}</td>
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" {{$val->active == 1 ? 'checked' : ''}} disabled>
                      </div>
                </td>
                <td>
                    <a href="{{ url('edit-slider/'.$val->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ url('delete-slider/'.$val->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete it');">Delete</a>
                </td>
            </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection