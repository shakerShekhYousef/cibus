@extends('layouts.dashboard.base')
@section('pageTitle', 'Edit blog ' . $blog->title)
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit blog {{ $blog->title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- {{ Breadcrumbs::render('blogs.edit', $blog->id) }} --}}
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
                                <h3 class="card-title">Edit blog {{ $blog->title }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="editBlog" action="{{ route('blogs.update', $blog->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Title</label>
                                            <input value="{{ $blog->title }}" type="text" name="title"
                                             class="form-control" id="exampleInputName2"
                                                   placeholder="Enter Title">
                                        </div>
                                          
                                        <div class="form-group">
                                            <label for="exampleInputName2">Body</label>
                                            <input value="{{ $blog->body }}" type="text" name="body" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter Body">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputRole1">Select Category</label>
                                            <select name="category_id" class="form-control" id="exampleInputRole1">
                                                @foreach($categories as $category)
                                                    @if($category->id == $blog->category_id)
                                                         <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                    @else
                                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputName2">Image</label>
                                            <input value="{{ $blog->image }}" type="file" name="image" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter Image">
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
            $('#editBlog').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    body: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                    
                },
                
                messages: {
                    title: {
                        required: "Please enter a name",
                    },
                    body: {
                        required: "Please enter a body",
                    },
                    image: {
                        required: "Please enter an image",
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
@endsection
@endsection
