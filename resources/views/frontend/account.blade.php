@extends('layouts.frontend.base')
@section('pageTitle', 'Sign Up')
@section('custom-style')
    <link href="{{asset('frontend/css/booking-sign_up.css')}}" rel="stylesheet">
    <style>
        .header{
            background: #a10101!important;
        }
        .invalid-feedback{
            color: red;
        }
        .is-invalid{
            border-color: red;
            color: red;
        }
    </style>
@endsection
@section('content')
    <!-- main -->
    <main class="bg_gray pattern">
        <div class="container margin_60_40" style="margin-top: 4rem">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="sign_up">
                        <div class="head">
                            <div class="title">
                                <h3>Sign Up</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <a href="#0" class="social_bt facebook">Sign up with Facebook</a>
                            <a href="#0" class="social_bt google">Sign up with Google</a>
                            <div class="divider"><span>Or</span></div>
                            <h6>Personal details</h6>
                            <form action="{{route('register')}}" method="post">
                                @csrf
                                @method("POST")
                                <div class="form-group">
                                    <input name="full_name" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" placeholder="First and Last Name">
                                    <i class="icon_pencil {{ $errors->has('full_name') ? ' is-invalid' : '' }}"></i>
                                    @if ($errors->has('full_name'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('full_name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address">
                                    <i class="icon_mail {{ $errors->has('full_name') ? ' is-invalid' : '' }}"></i>
                                    @if($errors->has('email'))
                                        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input name="mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="Mobile Phone">
                                    <i class="icon_phone {{ $errors->has('full_name') ? ' is-invalid' : '' }}"></i>
                                    @if($errors->has('mobile'))
                                        <span class="error invalid-feedback">{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>

                                <div class="form-group add_bottom_15">
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" id="password_sign"
                                           name="password">
                                    <i class="icon_lock {{ $errors->has('full_name') ? ' is-invalid' : '' }}"></i>
                                    @if($errors->has('password'))
                                        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group add_bottom_15">
                                    <input class="form-control" placeholder="Confirm Password" id="password_sign"
                                           name="password_confirmation">
                                    <i class="icon_lock"></i>
                                </div>
                                <button type="submit" class="btn_1 full-width mb_5">Sign up Now</button>
                            </form>
                        </div>
                    </div>
                    <!-- /box_booking -->
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->
@endsection
