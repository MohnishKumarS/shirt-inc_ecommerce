@extends('admin.adminlayout')

@section('content')


<div class="card">
    <div class="card-header">

        <h4>Category Page <i class="material-icons opacity-10">post_add</i></h4>
    </div>
    <div class="card-body ">

           {{-- --- filter search --- --}}
           <div class="mb-4 ">
            <form action="{{URL::current()}}" method="GET">
                <div class="row justify-content-start">
                    <div class="col-md-2">
                        <label>Filter by Category</label>
                        <select class="form-select" name="cat">
                            <option selected value="">Choose a category</option>
                            @forelse ($cat_list as $item)
                            <option  value="{{$item->slug}}" {{Request::get('cat') == $item->slug ? 'selected' : ''}}>{{$item->name}}</option>
                            @empty
                            <option  value="">No category found</option>
                            @endforelse
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
              
                <th style="width: 5%">Id</th>
                <th style="width: 10%">Image</th>
                <th style="width: 15%">Name</th>
                <th style="width: 30%">Description</th>
                <th style="width: 10%">Header</th>
                <th style="width: 20%">Action</th>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach ($category as $val)

                <tr class="align-middle">
                    <td>{{$i++}}</td>
                    <td><img src="/image/category/{{$val['image']}}" style="object-fit: contain" width="150" height="100"></td>
                    <td>{{$val->name}}</td>
                    <td class="text-break">{{$val->desc}}</td>
                    <td >
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" {{$val->status == '1'? 'checked' : ''}} @disabled(true) > 
                          </div>
                    </td>
                    <td>
                        <a href="{{ url('edit-category/'.$val->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ url('delete-category/'.$val->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete it');">Delete</a>
                    </td>
                    
                </tr>
            @endforeach
        </table>
    </div>

    
    </div>
</div>

@endsection