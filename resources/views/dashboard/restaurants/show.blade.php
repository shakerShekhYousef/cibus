@extends('layouts.dashboard.base')
@section('pageTitle', 'Restaurant-' . $restaurant->restaurant_name)
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
                        <h1>Profile. {{ $restaurant->restaurant_name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render('restaurants.show', $restaurant->id) }}
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
                                <h3 class="card-title">Restaurant {{ $restaurant->restaurant_name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="showUser">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Owner Name</label>
                                            <input readonly value="{{ $restaurant->owner_name }}" type="text"
                                                   name="owner_name"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Enter owner name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Owner Email</label>
                                            <input readonly value="{{ $restaurant->owner_email }}" type="email"
                                                   name="owner_email"
                                                   class="form-control" id="exampleInputEmail1"
                                                   placeholder="Enter owner email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Restaurant Name</label>
                                            <input readonly value="{{ $restaurant->restaurant_name }}" type="text"
                                                   name="restaurant_name"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Enter restaurant name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Address</label>
                                            <input readonly value="{{ $restaurant->address }}" type="text"
                                                   name="address" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter address">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Latitude</label>
                                            <input readonly value="{{ $restaurant->latitude }}" type="text"
                                                   name="latitude" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter latitude">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Longitude</label>
                                            <input readonly value="{{ $restaurant->longitude }}" type="text"
                                                   name="longitude" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter longitude">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Description</label>
                                            <textarea readonly type="text" name="description" class="form-control"
                                                      id="summernote" placeholder="Enter description">
                                                {{ $restaurant->description }}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Features</label>
                                            <input readonly value="{{ $restaurant->features }}" type="text"
                                                   name="features" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter features">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputRole1">City</label>
                                            <select name="city_id" class="form-control" id="exampleInputRole1">
                                                <option selected disabled
                                                        value="{{$restaurant->city->id}}">{{$restaurant->city->name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputRole1">Category</label>
                                            <select name="category_id" class="form-control" id="exampleInputRole1">
                                                <option selected disabled
                                                        value="{{$restaurant->category->id}}">{{$restaurant->category->name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputRole1">User</label>
                                            <select name="user_id" class="form-control" id="exampleInputRole1">
                                                <option selected disabled
                                                        value="{{$restaurant->user->id}}">{{$restaurant->user->full_name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Contact information facebook-gmail</label>
                                            <input readonly
                                                   value="{{ $restaurant->contact_information_facebook_gmail }}"
                                                   type="text" name="contact_information_facebook_gmail"
                                                   class="form-control"
                                                   id="exampleInputName2"
                                                   placeholder="Enter contact information facebook-gmail">
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
