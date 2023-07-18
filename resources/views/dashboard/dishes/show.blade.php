@extends('layouts.dashboard.base')
@section('pageTitle', 'Dish-' . $dish->name)
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
                        <h1>Profile. {{ $dish->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                             {{ Breadcrumbs::render('dishes.show', $dish->id) }}
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
                                <h3 class="card-title">Dish {{ $dish->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="showUser">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Name</label>
                                            <input readonly value="{{ $dish->name }}" type="text" name="name"
                                                   class="form-control" id="exampleInputName2" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Category</label>
                                            <select name="category_id" class="form-control" id="exampleInputName2">
                                                <option selected disabled value="{{$dish->category->id}}">{{$dish->category->name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Rating</label>
                                            <input readonly value="{{ $dish->rating }}" type="text" name="rating"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Rating">
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
                                            <input readonly value="{{ $dish->price }}" type="text" name="price"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Enter Price">
                                        </div>
                                        <div class="form-group">
                                            <div class="box bg-white rounded box-shadow p-3 mb-3 fs-14 c-666">
                                                <label for="image_select" class="mb-4">Image</label>

                                                <div id="image_container">

                                                    {{-- Image preview container --}}
                                                    @if ($dish->image)
                                                        <img
                                                            src="{{ asset('storage/images/dishes/'.$dish->restaurant->restaurant_name.'/'.$dish->image) }}"
                                                            id="image_preview" class="img-fluid"/>
                                                    @endif
                                                </div>
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
