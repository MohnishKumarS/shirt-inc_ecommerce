@extends('admin.adminlayout')

@section('content')


<div class="card">
    <div class="card-header">
        <h4>Add Category <i class="material-icons opacity-10">post_add</i></h4>
    </div>
    <div class="card-body">
        <form action="/insert-category" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Slug name</label>
                    <input type="text" class="form-control" name="slug" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="form-label">Description</label>
                    <input type="text" class="form-control" name="desc" required>
                </div>

           
                <div class="col-md-4 mb-3">
                    <label for="" class="form-label">Category Icon</label>
                    <input type="file" class="form-control" name="icon" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="" class="form-label">Category Image</label>
                    <input type="file" class="form-control" name="images" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="" class="form-label">Poster Image</label>
                    <input type="file" class="form-control" name="poster"  >
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                     <label for="" class="form-label">Product type</label>
                    </div>
                     <div class="form-check form-check-inline">
                         <input class="form-check-input" type="checkbox" name="product_type[]" value="Mens">
                         <label class="form-check-label" >Mens</label>
                       </div>
                     <div class="form-check form-check-inline">
                         <input class="form-check-input" type="checkbox" name="product_type[]" value="Womens">
                         <label class="form-check-label" >Womens</label>
                       </div>
                       <div class="form-check form-check-inline">
                         <input class="form-check-input" type="checkbox" name="product_type[]" value="Unisex">
                         <label class="form-check-label">Unisex</label>
                       </div>
                     
                     
                 </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="" class="form-label">Action</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  name="status">
                        <label class="form-check-label">Header status</label>    
                        {{--  navbar status add category name -- --}}
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  name="popular" >
                        <label class="form-check-label" >Active Poster</label>
                      </div>
                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Meta Keyword</label>
                    <input type="text" class="form-control" name="meta_keywords" >
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="form-label">Meta Description</label>
                    <input type="text" class="form-control" name="meta_desc" >
                </div>

                <div class="col-md-12 mb-3  mt-3">
                    <button class="btn btn-primary  w-50 d-block mx-auto" type="submit">Submit</button>
                </div>

            </div>
        </form>
    </div>
</div>
    
@endsection