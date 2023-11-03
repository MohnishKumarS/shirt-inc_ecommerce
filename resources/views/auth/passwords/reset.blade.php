@extends('layouts.userpage')

@section('title', 'Welcome to E-Shop')

@section('content')

    <!-- ----------------- forget password - page ---------------- -->
    <!-- =================================================== -->
    <div class="forgot-pass" style="margin:150px 0 ">
     
            <div class="row align-items-center h-100">
                <div class="col-lg-5  mx-auto">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
            
                    <div class="p-5 bg-white border rounded-4 shadow">
                        <h3 class="mb-4">Reset  password</h3>

                        {{-- <p>Enter your email address and we'll send you a link to reset your password.</p> --}}

                        <div class="mb-3">
                            <label class="text-sm-bold pb-2">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ $email ?? old('email') }}" required>
                            @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label class="text-sm-bold pb-2">Passwords</label>
                            <input type="password" name="password" class="form-control"  required>
                            @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label class="text-sm-bold pb-2">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"  required>
                         
                        </div>
                        <div class="mt-4">
                            <button class="btn-blue">Reset Password</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
 


    </div>


@endsection
