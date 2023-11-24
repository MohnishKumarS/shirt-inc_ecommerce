@extends('layouts.userpage')

@section('title', 'Welcome to E-Shop')

@section('content')

    <!-- ----------------- login - page ---------------- -->
    <!-- =================================================== -->

    <div class="elog-login">
        <div class="container h-100">

            <div class="row d-flex justify-content-center  align-items-center py-5 py-lg-0">

                <div class="col-xxl-5 col-lg-6 col-md-10 col-sm-10 col-10">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="elog-wrapper">
                            <h2 class="elog-title text-center">
                                <img width="94" height="94"
                                    src="https://img.icons8.com/3d-fluency/94/user-male-circle.png"
                                    alt="user-male-circle" loading="lazy"/>
                            </h2>

                            <div class="elog-box">
                                {{-- -- error display message --- --}}
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Login failed!</strong> Incorrect email or password <i
                                            class="fa-solid fa-circle-exclamation fa-bounce fs-6 ms-1"></i>
                                    </div>
                                @enderror
                                <div class="elog-item">
                                    <input type="text" class="e-input" placeholder="Email ID" name="email"
                                        value="{{ old('email') }}">
                                    <span class="e-icon"><i class="fa-solid fa-envelope"></i></span>
                                </div>

                                <div class="elog-item">
                                    <input type="password" class="e-input e-input-pass" placeholder="password" name="password">
                                    <span class="e-icon"  style="cursor:pointer" onclick="showpass(this)">
                                    <i class="fa-solid fa-eye-slash eye-open" id="eye-open"></i>
                                </span>
                                </div>
                                <div class="elog-item text-end">
                                    <a href="{{route('password.request')}}" class="e-link">Forget Password ?</a>
                                </div>
                                <div class="elog-btns">
                                    <button class="btn-prime w-100">Login</button>
                                </div>
                                <div class="elog-link">
                                    <h6>Need an account? <a href="{{ route('signup') }}" class="e-link">signup</a></h6>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="elog-img d-flex justify-content-center mt-5 mt-lg-0">
                        <img src="{{ asset('image/products/bb/bb10.webp') }}" alt="sponser" class="img-fluid rounded" loading="lazy">
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('scripts')

<script>
     function showpass(e) {
        let input_box = $('.e-input-pass');
        let eye_show = $(e).find('#eye-open');
        //  console.log(input_box.attr('type'));
        if(input_box.attr('type') === "password"){
            input_box.attr('type','text');
            eye_show.removeClass("fa-eye-slash");
            eye_show.addClass("fa-eye");
        }
        else{
            input_box.attr('type','password');
            eye_show.removeClass("fa-eye");
            eye_show.addClass("fa-eye-slash");
        }
       
     }
</script>
@endsection
