@extends('layouts.userpage')

@section('title', 'Welcome to E-Shop')

@section('content')

    <!-- ----------------- forget password - page ---------------- -->
    <!-- ======================================================== -->


    <main>
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <h2 class="section-title text-center fs-3 mb-xl-5">Reset Your Password</h2>
            <p>We will send you an email to reset your password</p>
            <div class="reset-form">
                <form method="POST" action="{{ route('password.email') }}" name="reset-form" class="needs-validation" novalidate >
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control form-control_gray"
                            value="{{ old('email') }}" id="customerNameEmailInput" placeholder="Email address *" required>
                        <label for="customerNameEmailInput">Email address *</label>
                    </div>

                    @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                    <button class="btn btn-primary w-100 text-uppercase" type="submit">Submit</button>

                    <div class="customer-option mt-4 text-center">
                        <span class="text-secondary">Back to</span>
                        <a href="{{ route('signin') }}" class="btn-text js-show-register">Login</a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <div class="mb-4 mb-xl-5 pt-1 pb-5"></div>


@endsection
