@extends('layouts.userpage')

@section('title', 'Welcome to E-Shop')

@section('content')

    <!-- ----------------- forget password - page ---------------- -->
    <!-- =================================================== -->
    <div class="forgot-pass " style="margin:150px 0 ">
     
            <div class="row align-items-center h-100">
                <div class="col-11 col-md-8 col-lg-7 col-xl-5  mx-auto">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
            
                    <div class="p-5 bg-white border rounded-4 shadow">
                        <h3 class="mb-4">Reset your password</h3>

                        <p>Enter your email address and we'll send you a link to reset your password.</p>

                        <div>
                            <label class="text-sm-bold pb-2">Your email address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mt-4">
                            <button class="btn-blue">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
 


    </div>


@endsection
