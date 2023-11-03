@extends('layouts.userpage')

@section('title','Write a Review')

@section('content')
 
<div class="container">

    <div class="card mt-4">
        <div class="card-header">
            <h3>Edit Review</h3>
        </div>

        <div class="card-body">
            <div>
                <div class="rows">
                   <h6> <img src="{{asset('image/product/'.$product->image)}}" alt="" width='60' class="me-3">{{$product->desc}}</h6>

                </div>
                <hr>

                <h6 class="text-muted">Edit your review for {{$product->name}}</h6>
                <form action="{{url('/update-review')}}" method="post">
                    @csrf
                    <input type="hidden" name="review_id" value="{{$review->id}}">
                    <textarea name="user_review" class="form-control" rows="5" >{{$review->user_review}}</textarea>
                    <hr>
                    <button type="submit" class="btn btn-warning float-end">Submit</button>
                </form>


              
            </div>
        </div>
    </div>
</div>











@endsection