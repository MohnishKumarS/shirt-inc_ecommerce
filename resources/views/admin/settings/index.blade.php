@extends('admin.adminlayout')

@section('content')


<div class="card">
    <div class="card-header">

        <h4>Site Settings <i class="material-icons opacity-10">settings_b_roll</i></h4>

    </div>
    <div class="card-body">

        {{-- --- settings page --- --}}
        <form action="{{url('/site-setting-store')}}" method="post">
            @csrf
        <div class="row">

            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Website name</label>
                <input type="text" class="form-control" name="web_name" value="{{$set->website_name ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Website URL</label>
                <input type="text" class="form-control" name="web_url" value="{{$set->website_url ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Page Title </label>
                <input type="text" class="form-control" name="web_title" value="{{$set->page_title ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Meta keyword</label>
                <input type="text" class="form-control" name="meta_keyword" value="{{$set->meta_keyword ?? '' }}">
            </div>
            <div class="col-lg-12 mb-4">
                <label for="" class="form-label">Meta description</label>
                <input type="text" class="form-control" name="meta_desc" value="{{$set->meta_description ?? '' }}">
            </div>

        </div>


        <div class="row">
            <h5 class="my-4">Website Information</h5>
            <div class="col-lg-12 mb-4">
                <label for="" class="form-label">Address 1</label>
                <input type="text" class="form-control" name="addr1" value="{{$set->address1 ?? '' }}">
            </div>
            <div class="col-lg-12 mb-4">
                <label for="" class="form-label">Address 2</label>
                <input type="text" class="form-control" name="addr2" value="{{$set->address2 ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Phone No 1</label>
                <input type="text" class="form-control" name="mobile1" value="{{$set->phone1 ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Phone 2</label>
                <input type="text" class="form-control" name="mobile2" value="{{$set->phone2 ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Email 1</label>
                <input type="text" class="form-control" name="email1" value="{{$set->email1 ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Email 2</label>
                <input type="text" class="form-control" name="email2" value="{{$set->email2 ?? '' }}">
            </div>
        </div>

        <div class="row">
            <h5 class="my-4">Social Media</h5>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Facebook</label>
                <input type="text" class="form-control" name="fb"  value="{{$set->facebook ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Instagram</label>
                <input type="text" class="form-control" name="insta"  value="{{$set->instagram ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Youtube</label>
                <input type="text" class="form-control" name="youtube"  value="{{$set->youtube ?? '' }}">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="" class="form-label">Twitter</label>
                <input type="text" class="form-control" name="twitter"  value="{{$set->twitter ?? '' }}">
            </div>
        </div>

        <div class="my-4">
            <button class="btn btn-primary  w-25 d-block mx-auto" type="submit">Submit</button>
        </div>
    </form>

    </div>
</div>

@endsection
