@extends('layouts.dashboard.base')
@section('pageTitle', 'Edit dish ' . $dish->name)
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
                        <h1>Edit dish {{ $dish->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                             {{ Breadcrumbs::render('dishes.edit', $dish->id) }}
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
                                <h3 class="card-title">Edit dish {{ $dish->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="editDish" action="{{ route('dishes.update', $dish->id) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Name</label>
                                            <input value="{{ $dish->name }}" type="text" name="name"
                                             class="form-control" id="exampleInputName2"
                                                   placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputRole1">Select Category</label>
                                            <select name="category_id" class="form-control select2bs4" id="exampleInputRole1">
                                                @foreach($categories as $category)
                                                    @if($category->id == $dish->category_id)
                                                         <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                    @else
                                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Description</label>
                                            <textarea type="text" name="description" class="form-control"
                                                      id="summernote" placeholder="Enter Description">
                                                {{ $dish->description }}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Price</label>
                                            <input value="{{ $dish->price }}" type="number" name="price" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter Price">
                                        </div>
                                        <div class="form-group">
                                            <div class="box bg-white rounded box-shadow p-3 mb-3 fs-14 c-666">
                                                <label for="image_select" class="mb-4">Image</label>
                                                <div id="image_container">
                                                    {{-- Image preview container --}}
                                                    @if ($dish->image)
                                                        <img
                                                            src="{{asset('/storage/images/dishes/'.$dish->restaurant->restaurant_name.'/'.$dish->image)}}"
                                                            id="image_preview" class="img-fluid"/>
                                                    @endif

                                                    <input type="file" name="logo" id="image_select"
                                                           class="form-control-file fs-14 mt-1 @if ($dish->image) display-none @endif"
                                                           accept="image/*">

                                                    <button type="button" id="remove_image_button"
                                                            class="btn btn-sm btn-link p-0 @if ($dish->image) display-block @else display-none @endif">
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
            $('#editDish').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                    rating: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },

                },

                messages: {
                    name: {
                        required: "Please enter a name",
                    },
                    image: {
                        required: "Please enter an image",
                    },
                    rating: {
                        required: "Please enter a rating",
                    },
                    description: {
                        required: "Please enter a description",
                    },
                    price : {
                        required: "Please enter a price",
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
