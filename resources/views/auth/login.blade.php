@extends('layouts.userpage')

@section('title', 'Sign in to Shirt-inc')

@section('content')

    <!-- ----------------- login - page ---------------- -->
    <!-- =================================================== -->
    <main>
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <h2 class="d-none">Login & Register</h2>
            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab"
                        href="#tab-item-login" role="tab" aria-controls="tab-item-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore" id="register-tab" data-bs-toggle="tab"
                        href="#tab-item-register" role="tab" aria-controls="tab-item-register"
                        aria-selected="false">Register</a>
                </li>
            </ul>
            <div class="tab-content pt-2" id="login_register_tab_content">
                {{-- --------- login tab ------- --}}
                
                <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                    <div class="login-form">
                        <form name="login-form" method="POST" action="{{ route('login') }}" class="needs-validation" novalidate autocomplete="off">
                            @csrf
                             {{-- -- error display message --- --}}
                             @error('email')
                             <div class="alert alert-danger" role="alert">
                                 <strong>Login failed!</strong> Incorrect email or password. <i
                                     class="fa-solid fa-circle-exclamation fs-6 ms-1"></i>
                             </div>
                            @enderror
                            <div class="form-floating mb-3">
                                <input name="email" type="text" class="form-control form-control_gray" autocomplete="email"
                                    id="customerNameEmailInput1" placeholder="Email address *" required>
                                <label for="customerNameEmailInput1">Email address *</label>
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control form-control_gray" autocomplete="current-password"
                                    id="customerPasswodInput" placeholder="Password *" required>
                                <label for="customerPasswodInput">Password *</label>
                            </div>

                            <div class="d-flex align-items-center mb-3 pb-2">
                                <div class="form-check mb-0">
                                    <input name="remember" class="form-check-input form-check-input_fill"
                                        type="checkbox" value="" id="flexCheckDefault1">
                                    <label class="form-check-label text-secondary" for="flexCheckDefault1">Remember
                                        me</label>
                                </div>
                                <a href="{{route('password.request')}}" class="btn-text ms-auto">Lost password?</a>
                            </div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Log In</button>

                            <div class="customer-option mt-4 text-center">
                                <span class="text-secondary">No account yet?</span>
                                <a href="#register-tab" class="btn-text js-show-register">Create Account</a>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- --------- register tab ------- --}}

                <div class="tab-pane fade" id="tab-item-register" role="tabpanel" aria-labelledby="register-tab">
                    <div class="register-form">
                        <form name="register-form" class="needs-validation" novalidate method="POST" action="{{ route('register') }}" autocomplete="off">
                            @csrf
                            <div class="form-floating mb-3">
                                <input name="name" type="text" class="form-control form-control_gray" title="Username must be at least 4 characters long." autocomplete="username"
                                    id="customerNameRegisterInput" placeholder="Username" required value="{{ old('name') }}" pattern=".{4,}">
                                <label for="customerNameRegisterInput">Username</label>
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control form-control_gray" autocomplete="email"
                                    id="customerEmailRegisterInput" placeholder="Email address *" required>
                                <label for="customerEmailRegisterInput">Email address *</label>
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input name="mobile" type="text" class="form-control form-control_gray" onkeyup="this.value = this.value.replace(/[^0-9]/g,'')" maxlength="10"
                                pattern="[0-9]{10}" title="Please enter a 10-digit mobile number" id="customermobileRegisterInput" placeholder="Email address *" required>
                                <label for="customermobileRegisterInput">Mobile *</label>
                            </div>
                            @error('mobile')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control form-control_gray" pattern=".{8,}" autocomplete="new-password"
                                    id="customerPasswodRegisterInput" placeholder="Password *" required>
                                <label for="customerPasswodRegisterInput">Password *</label>
                            </div>

                            <div class="d-flex align-items-center mb-3 pb-2">
                                <p class="m-0">Your personal data will be used to support your experience throughout
                                    this website, to manage access to your account, and for other purposes described in
                                    our privacy policy.</p>
                            </div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


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
