@extends('layouts.frontend.base')
@section('pageTitle', 'Submit Restaurant')
@section('custom-style')
    <!-- SPECIFIC CSS -->
    <link href="css/submit.css" rel="stylesheet">
    <style>
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
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(../../../../frontend/img/hero_submit.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Attract New Customers</h1>
                            <p>More bookings from diners around the corner</p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
        </div>
        <!-- /hero_single -->

        <div>
            <div class="container margin_60_40">
                <div class="main_title center">
                    <span><em></em></span>
                    <h2>Why Submit to Foogra</h2>
                    <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                </div>

                <div class="row justify-content-center align-items-center add_bottom_15">
                    <div class="col-lg-5">
                        <div class="box_about">
                            <h3>Boost your Bookings</h3>
                            <p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
                            <p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei,
                                vel
                                ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel.
                                Ex
                                velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio
                                delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
                            <img src="{{asset('frontend/img/arrow_about.png')}}" alt="" class="arrow_1">
                        </div>
                    </div>
                    <div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
                        <img src="{{asset('frontend/img/about_1.svg')}}" alt="" class="img-fluid" width="250" height="250">
                    </div>
                </div>
                <!-- /row -->
                <div class="row justify-content-center align-items-center add_bottom_15">
                    <div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
                        <img src="{{asset('frontend/img/about_2.svg')}}" alt="" class="img-fluid" width="250" height="250">
                    </div>
                    <div class="col-lg-5">
                        <div class="box_about">
                            <h3>Manage Easly</h3>
                            <p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
                            <p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei,
                                vel
                                ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel.
                                Ex
                                velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio
                                delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
                            <img src="{{asset('frontend/img/arrow_about.png')}}" alt="" class="arrow_2">
                        </div>
                    </div>
                </div>
                <!-- /row -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-5">
                        <div class="box_about">
                            <h3>Reach New Customers</h3>
                            <p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
                            <p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei,
                                vel
                                ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel.
                                Ex
                                velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio
                                delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
                        </div>

                    </div>
                    <div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
                        <img src="{{asset('frontend/img/about_3.svg')}}" alt="" class="img-fluid" width="250" height="250">
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_gray -->
        <!-- /container -->

        <div class="bg_gray pattern" id="submit">
            <div class="container margin_60_40">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="text-center add_bottom_15">
                            <h4>Please fill the form below</h4>
                            <p>Id persius indoctum sed, audiam verear his in, te eum quot comprehensam. Sed impetus
                                vocibus
                                repudiare et.</p>
                        </div>
                        <div id="message-register"></div>
                        <form method="post" action="{{route('front.submit-restaurant.storeRequest')}}" id="register">
                            @csrf
                            @method("POST")
                            <h6>Personal data</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" placeholder="Name and Last Name"
                                               name="owner_name" id="name_register">
                                        @if ($errors->has('owner_name'))
                                            <span class="error invalid-feedback">
                                            {{ $errors->first('owner_name') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row add_bottom_15">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control{{ $errors->has('owner_email') ? ' is-invalid' : '' }}" placeholder="Email Address"
                                               name="owner_email" id="email_register">
                                        @if ($errors->has('owner_email'))
                                            <span class="error invalid-feedback">
                                            {{ $errors->first('owner_email') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <h6>Restaurant data</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" placeholder="Restaurant Name"
                                               name="restaurant_name" id="restaurantname_register">
                                        @if ($errors->has('restaurant_name'))
                                            <span class="error invalid-feedback">
                                            {{ $errors->first('restaurant_name') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" placeholder="Address"
                                               name="address" id="address_register">
                                        @if ($errors->has('address'))
                                            <span class="error invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row add_bottom_15">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="city_id" id="country_register">
                                            <option value="">City</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <!-- /row -->
                            <div class="form-group text-center">
                                <button type="submit" class="btn_1" id="submit-register">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_gray -->

    </main>
    <!-- /main -->
@endsection
