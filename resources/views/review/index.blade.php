@extends('layouts.userpage')

@section('title','Write a Review')

@section('content')
 
<div class="container">

    <div class="card mt-4">
        <div class="card-header">
            <h3>Create Review</h3>
        </div>

        <div class="card-body">
            <div>
                <div class="rows">
                   <h6> <img src="{{asset('image/product/'.$product_check->image)}}" alt="" width='60' class="me-3">{{$product_check->desc}}</h6>

                </div>
                <hr>
                {{-- {{$verified_purchase}} --}}

                @if ($verified_purchase->count() > 0)

                <h5>You are writing a review for {{$product_check->name}}</h5>
                <form action="{{url('/add-review')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product_check->id}}">
                    <textarea name="user_review" class="form-control" rows="5" placeholder="Write a review . What did you like or dislike?"></textarea>
                    <hr>
                    <button type="submit" class="btn btn-warning float-end">Submit</button>
                </form>


                @else

                <div class="alert alert-danger">
                    <h5>You are not eligible to review this product</h5>
                    <p>For the trustworthiness of the review , only customers who
                        purchased the product can write a review of the product..
                    </p>
                </div>

                <div class="text-center">
                    <a href="{{url('/')}}" class="btn btn-outline-primary mt-4">Go to Home Page</a>
                </div>
                    
                @endif
            </div>
        </div>
    </div>
</div>











@endsection