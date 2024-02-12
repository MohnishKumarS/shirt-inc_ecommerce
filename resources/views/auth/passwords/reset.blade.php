@extends('layouts.userpage')

@section('title', 'Welcome to Shirt-inc')

@section('content')

    <!-- -----------------  password update  - page ---------------- -->
    <!-- =================================================== -->

    <main>
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <h2 class="section-title text-center fs-3 mb-xl-5">Change Your Password</h2>
            {{-- <p>We will send you an email to reset your password</p> --}}
            <div class="reset-form">
                <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control form-control_gray" value="{{ $email ?? old('email') }}"
                            id="customerNameEmailInput" placeholder="Email address *" required> 
                        <label for="customerNameEmailInput">Email address *</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="account_new_password"
                            placeholder="New password" required>
                        <label for="account_new_password">New password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            data-cf-pwd="#account_new_password" id="account_confirm_password"
                            placeholder="Confirm new password" required>
                        <label for="account_confirm_password">Confirm new password</label>
                        <div class="invalid-feedback">Passwords did not match!</div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button class="btn btn-primary w-100 text-uppercase" type="submit">Submit</button>

                    <div class="customer-option mt-4 text-center">
                        <span class="text-secondary">Back to</span>
                        <a href="{{route('signin')}}" class="btn-text js-show-register">Login</a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


@endsection
