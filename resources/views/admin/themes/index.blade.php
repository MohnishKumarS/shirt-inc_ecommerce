@extends('admin.adminlayout')

@section('content')
<div class="card pb-5">


    <div class="card-header">
        <h4>Add Themes  <i class="material-icons opacity-10">post_add</i></h4>
    </div>
    <div class="card-body">
       <div class="add-slider">
           <form action="{{url('/add-themes')}}" method="post" enctype="multipart/form-data"> 
            @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Name:</label>
                        <input type="text" class="form-control"  name="themes" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Slug:</label>
                        <input type="text" class="form-control"  name="slug" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Icon:</label>
                        <input type="file" class="form-control"  name="icon" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Image:</label>
                        <input type="file" class="form-control"  name="image" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Poster:</label>
                        <input type="file" class="form-control"  name="poster">
                    </div>
                   
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Status :</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="active" >
                                <label class="form-check-label" >Active poster</label>
                              </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3  mt-3">
                        <button class="btn btn-primary  w-25 d-block mx-auto" type="submit">Submit</button>
                    </div>
                </div>
           </form>
       </div>
    </div>


    <div class="card-header">
        <h4>Themes  <i class="material-icons opacity-10">post_add</i></h4>
    </div>
<div class="card-body">
    
    <div>
        <table class="table table-striped text-center">
            <tr class="text-center">
                <th>#</th>
                <th>Icon</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @php
                $i = 1;
            @endphp
            @forelse ($theme as $val)
                <tr>
                  <th>{{$i++}}</th>
                  <td><img src="{{url('image/themes/icon/'.$val->icon)}}" style="object-fit: contain" width="100" alt="{{$val->slug}}"></td>
                  <td>{{$val->name}}</td>
                  <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"
                            {{ $val->status == 1 ? 'checked' : '' }} disabled>
                    </div>
                </td>
                <td>
                  <a href="{{ url('edit-theme/' . $val->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{ url('delete-theme/' . $val->id) }}" class="btn btn-danger"
                      onclick="return confirm('Are you sure to delete it');">Delete</a>
              </td>
                </tr>
            @empty
                <tr>
                  <td colspan="4">
                    <div class="my-5 text-center text-danger">
                      No Theme found !
                    </div>
                  </td>
                </tr>
            @endforelse
    
        </table>
    </div>
</div>
</div>
@endsection