@extends('admin.adminlayout')

@section('content')
    <div class="card pb-5">


        <div class="card-header">
            <h4>Advertise Poster <i class="material-icons opacity-10">post_add</i></h4>
        </div>
        <div class="card-body">
            <div class="add-slider">
                <form action="{{ url('/add-poster-ads') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="ads_title" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="ads_desc" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Add advertise Image :</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Current Poster status:</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="active">
                                    <label class="form-check-label">Active</label>
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



        {{-- ----all  ads poster ----- --}}

        <div class="card-header">
            <h4>Slider Poster <i class="material-icons opacity-10">post_add</i></h4>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <tr class="text-center">
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
                @php
                    $i = 1;
                @endphp



                @if (count($poster))
                    @foreach ($poster as $val)
                        <tr class="align-middle text-center">
                            <td>{{ $i++ }}</td>
                            <td>
                                <img src="{{ asset('image/Ads-poster/' . $val->image) }}" width="400" height='200'
                                    style="object-fit: contain" alt="ads-poster">
                            </td>
                            <td>{{ $val->title }}</td>
                            <td>{{ $val->desc }}</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                        {{ $val->active == 1 ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <a href="{{ url('edit-poster/' . $val->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('delete-poster/' . $val->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete it');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            <div class="text-danger my-5 text-center">
                                No Ads poster Found !
                            </div>
                        </td>
                    </tr>
                @endif

            </table>
        </div>



    </div>
@endsection
