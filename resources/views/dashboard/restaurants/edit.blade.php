@extends('layouts.dashboard.base')
@section('pageTitle', 'Edit restaurant ' . $restaurant->restaurant_name)
@section('custom-style')
    <style>
        .img-fluid {
            max-width: 100%;
            height: 138px;
        }
    </style>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit restaurant {{ $restaurant->restaurant_name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render('restaurants.edit', $restaurant->id) }}
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit restaurant {{ $restaurant->restaurant_name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="editRestaurant" action="{{ route('restaurants.update', $restaurant->id) }}"
                                  method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputName2">Owner name</label>
                                                <input value="{{ $restaurant->owner_name }}" type="text"
                                                       name="owner_name"
                                                       class="form-control" id="exampleInputName2"
                                                       placeholder="Enter Owner Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Owner Email</label>
                                                <input readonly value="{{ $restaurant->owner_email }}" type="email"
                                                       name="owner_email"
                                                       class="form-control" id="exampleInputEmail1"
                                                       placeholder="Enter Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2">Restaurant Name</label>
                                                <input value="{{ $restaurant->restaurant_name }}" type="text"
                                                       name="restaurant_name" class="form-control"
                                                       id="exampleInputName2" placeholder="Enter Restaurant Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2">Address</label>
                                                <input value="{{ $restaurant->address }}" type="text" name="address"
                                                       class="form-control"
                                                       id="exampleInputName2" placeholder="Enter Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2">Latitude</label>
                                                <input value="{{ $restaurant->latitude }}" type="text" name="latitude"
                                                       class="form-control"
                                                       id="exampleInputName2" placeholder="Enter Latitude">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2">Longitude</label>
                                                <input value="{{ $restaurant->longitude }}" type="text" name="longitude"
                                                       class="form-control"
                                                       id="exampleInputName2" placeholder="Enter Longitude">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2">Description</label>
                                                <textarea type="text" name="description" class="form-control"
                                                          id="summernote" placeholder="Enter Description">
                                                {{ $restaurant->description }}
                                            </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2">Features</label>
                                                <input value="{{ $restaurant->features }}" type="text" name="features"
                                                       class="form-control"
                                                       id="exampleInputName2" placeholder="Enter Features">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputRole1">Select City</label>
                                                <select name="city_id" class="form-control select2bs4"
                                                        id="exampleInputRole1">
                                                    @foreach($cities as $city)
                                                        @if($city->id == $restaurant->city_id)
                                                            <option selected
                                                                    value="{{$city->id}}">{{$city->name}}</option>
                                                        @else
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputRole1">Select Category</label>
                                                <select name="category_id" class="form-control select2bs4"
                                                        id="exampleInputRole1">
                                                    @foreach($categories as $category)
                                                        @if($category->id == $restaurant->category_id)
                                                            <option selected
                                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                        @else
                                                            <option
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2">Contact information
                                                    facebook-gmail</label>
                                                <input value="{{ old('contact_information_facebook_gmail') }}"
                                                       type="text"
                                                       name="contact_information_facebook_gmail" class="form-control"
                                                       id="exampleInputName2"
                                                       placeholder="Enter Contact information facebook-gmail">
                                            </div>
                                            <div class="form-group">
                                                <div class="box bg-white rounded box-shadow p-3 mb-3 fs-14 c-666">

                                                    <label for="image_select" class="mb-4">Logo</label>

                                                    <div id="image_container">

                                                        {{-- Image preview container --}}
                                                        @if ($restaurant->logo)
                                                            <img
                                                                src="{{ asset('storage/images/restaurants/'.$restaurant->restaurant_name.'/'.$restaurant->logo) }}"
                                                                id="image_preview" class="img-fluid"/>
                                                        @endif

                                                        <input type="file" name="logo" id="image_select"
                                                               class="form-control-file fs-14 mt-1 @if ($restaurant->logo) display-none @endif"
                                                               accept="image/*">

                                                        <button type="button" id="remove_image_button"
                                                                class="btn btn-sm btn-link p-0 @if ($restaurant->logo) display-block @else display-none @endif">
                                                            Remove image
                                                        </button>
                                                    </div>

                                                    @if ($errors->has('image'))
                                                        <span class="invalid-message">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@section('custom-script')
    <script>
        $(function () {
            $('#createRestaurant').validate({
                rules: {
                    owner_name: {
                        required: true,
                    },
                    owner_email: {
                        required: true,
                        owner_email: true,
                    },
                    restaurant_name: {
                        required: true,
                    },
                    address: {
                        required: true,

                    },
                    latitude: {
                        required: true,
                        owner_email: true,
                    },
                    longitude: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    logo: {
                        required: true,
                    },
                    features: {
                        required: true,
                    },
                    contact_information_facebook_gmail: {
                        required: true,
                    }
                },
                messages: {
                    owner_name: {
                        required: "Please enter an owner name",

                    },
                    owner_email: {
                        required: "Please enter an owner email",
                        email: "Please enter a valid owner email address"
                    },
                    restaurant_name: {
                        required: "Please enter a restaurant name",
                    },
                    address: {
                        required: "Please enter an address",
                    },
                    latitude: {
                        required: "Please enter a latitude",
                    },
                    longitude: {
                        required: "Please enter a longitude",
                    },
                    description: {
                        required: "Please enter a description",
                    },
                    logo: {
                        required: "Please enter a logo",
                    },
                    features: {
                        required: "Please enter a features",
                    },

                    contact_information_facebook_gmail: {
                        required: "Please enter a contact information facebook-gmail",
                    },

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    <!-- Page specific script -->
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        $(function () {
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        })

    </script>
@endsection
@endsection
