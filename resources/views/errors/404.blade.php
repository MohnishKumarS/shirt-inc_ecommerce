@extends('layouts.userpage')

@section('title', '404 not found')

@section('content')

    <section>
        <div class="container">
            <div class="bg-white" style="padding: 50px 0 90px ">
                <div class="text-center">
                    <img src="{{ asset('image/404/404-1.webp') }}" alt="pahe not found" class="img-fluid" loading="lazy">
                    <h3>uh-oh Page Not <span class="title-hlorg"> Found...</span></h3>
                    <p class="text-sm text-normal">We're sorry, the page you are trying to reach doesn't exist.... </p>
                    <div class="mt-4">
                        <a href="{{ url('/') }}" class="btn btn-primary"> <i
                                class="fa-solid fa-bag-shopping me-1"></i> Go to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
