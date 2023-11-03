@extends('layouts.userpage')

@section('title', 'Welcome to E-Shop')

@section('content')
 
    <!-- ----------------- register - page ---------------- -->
    <!-- =================================================== -->

    <div class="elog-register">
        <div class="container">

            <div class="row  d-flex justify-content-center py-5 py-lg-0">
                <div class="col-lg-2 col-md-10 col-sm-10 col-one d-none d-lg-block">
                    <div class="elog-reg-img">
                        <img src="{{ asset('image/products/bb/bb1.png') }}" alt="" class="rounded">
                    </div>
                </div>

                <div class="col-lg-6 col-md-10 col-sm-10 col-10  col-two">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="elog-box">
                            <div class="elog-item">
                                <input type="text" id="name" class="e-input" name="name" value="{{ old('name') }}"
                                    placeholder="Name" autocomplete="name"  maxlength="20">
                                <span class="e-icon"><i class="fa-solid fa-user"></i></span>
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="elog-item">
                                <input type="email" id="email" class="e-input" name="email" value="{{ old('email') }}"
                                    placeholder="Email ID" autocomplete="email"  >
                                <span class="e-icon"><i class="fa-solid fa-envelope-open"></i></span>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="elog-item">
                                <input type="text" id="mobile" class="e-input" name="mobile" value="{{ old('mobile') }}"
                                    placeholder="mobile number" autocomplete="mobile" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" maxlength="10">
                                <span class="e-icon"><i class="fa-solid fa-phone-flip"></i></span>
                                @error('mobile')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="elog-item">
                                <input type="password" id="input-pass" class="e-input e-input-pass" name="password" placeholder="password"
                                 autocomplete="new-password" >
                                <span class="e-icon" style="cursor:pointer" onclick="showpass(this)">
                                    <i class="fa-solid fa-eye-slash eye-open" id="eye-open"></i>
                                </span>
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="elog-item">
                                <input type="password" id="password-confirm" class="e-input" name="password_confirmation"
                                    placeholder="Confirm Password" autocomplete="new-password">
                                <span class="e-icon"><i class="fa-solid fa-key"></i></span>
                            </div>

                            <div class="elog-btns">
                                <button class="btn-blue w-100" type="submit">Create a new account</button>
                            </div>
                            <div class="elog-link">
                                <h6>Already have an account? <a href="{{ route('signin')}}" class="e-link">login</a></h6>
                            </div>
                        </div>
                    </form>
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
