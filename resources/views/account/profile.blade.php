@extends('layouts.userpage')

@section('title', 'Profile')

@section('content')

    <!-- ----------------- Account profile  - page ---------------- -->
    <!-- =================================================== -->
    <style>
        .acc-profile .sec-title {
            border-bottom: 4px dotted #e4e4e4;
        }
    </style>
 <section>
    <div class="acc-profile ">

        <div class="container bg-white p-5">
            {{-- --------about ----------- --}}
            <div class="about-user">
                <h4 class="sec-title">
                    <span>About You</span>
                </h4>

                <div>
                    <form action="{{ url('/profile-about') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6 mb-4">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-circle-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Username"
                                        value="{{ Auth::user()->name }}" name="name">
                                  
                                </div>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-envelope"></i></span>
                                    <input type="text" class="form-control" placeholder="email"
                                        value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-mobile-screen-button"></i></span>
                                    <input type="text" class="form-control" placeholder="mobile"
                                        value="{{ Auth::user()->mobile }}" name="mobile">
                                
                                </div>
                                @error('mobile')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-calendar-days"></i></span>
                                    <input type="text" class="form-control" placeholder="Register date"
                                        value="{{ Auth::user()->created_at->format('d-M-Y') }}" readonly>
                                </div>
                            </div>


                            <div>
                                <button type='submit' class='btn-black mt-2'>Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            {{-- --------password  ----------- --}}
            <div class="pass-user">
                <h4 class="sec-title">
                    <span>Password</span>
                </h4>

                <div>
                    <form action="{{ url('profile-change-password') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-lg-5">
                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-unlock"></i></span>
                                        <input type="text" class="form-control" placeholder="Current Password"
                                            name="current_password">
                                      
                                    </div>
                                    @if ($errors->has('current_password'))
                                    <div class="text-danger">
                                        {{ $errors->first('current_password') }}
                                    </div>
                                @endif
                                </div>
                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-user-lock"></i></span>
                                        <input type="text" class="form-control" placeholder="New Password"
                                            name="password">
                                     
                                    </div>
                                    @if ($errors->has('password'))
                                    <div class="text-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                                </div>
                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-user-shield"></i></span>
                                        <input type="text" class="form-control" placeholder="Confirm New Password"
                                            name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type='submit' class='btn-black mt-2'>Change Password</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- --------address  ----------- --}}
            <div class="addr-user">
                <h4 class="sec-title">
                    <span>Address</span>
                </h4>

                <div>
                    @if (count($addr) > 0)
                    <form action="{{url('profile-change-addr')}}" method="post">
                        @csrf

                        @foreach ($addr as $item)
                            @php
                                $val = $item->address . ', ' . $item->city . ', ' . $item->state . ' - ' . $item->pincode;
                            @endphp
                            <div class="input-group mb-4">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="radio" name="addr_id" value="{{$item->id}}"
                                        {{ $item->status == true ? 'checked' : '' }}>
                                </div>
                                <input type="text" class="form-control" value="{{ $val }}" name="addr_val">
                                {{-- <a class="input-group-text text-danger" id="addon-wrapping" href="{{url('profile-rv-addr/'.$item->id)}}" onclick="return confirm('Are you sure you want to delete this address?');"><i
                                        class="fa-solid fa-trash-can"></i></a> --}}
                            </div>
                        @endforeach
                        
                    <div>
                        <button type='submit' class='btn-black mt-2'>Set Default address</button>
                    </div>
                </form>

                @else

                <div class="my-3">
                    <h5>No Address found!</h5>
                </div>

                    @endif



                </div>
            </div>

            {{-- --------  address  ----------- --}}
            <div class="close-user">
                <h4 class="sec-title">
                    <span>Close your account</span>
                </h4>

                <div>
                    <p>What happens when you close your account?</p>

                    <ul>
                        <li>Your account will be deleted permanently</li>
                        <li>Your profile will no longer appear anywhere on shirt-inc.</li>
                        <li>Your data and register details also removed</li>
                    </ul>

                    <div>
                        <button type='submit' class='btn-black mt-2 bg-danger'>Close account</button>
                    </div>
                </div>
            </div>











        </div>
    </div>
 </section>


@endsection
