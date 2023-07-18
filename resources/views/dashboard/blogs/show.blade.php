@extends('layouts.dashboard.base')
@section('pageTitle', 'Blog-' . $blog->name)
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile. {{ $blog->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- {{ Breadcrumbs::render('blogs.show', $blog->id) }} --}}
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
                                <h3 class="card-title">Blog {{ $blog->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="showBlog">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Title</label>
                                            <input readonly value="{{ $blog->title }}" type="text" name="title"
                                                   class="form-control" id="exampleInputName2" placeholder="Enter Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Body</label>
                                            <input readonly value="{{ $blog->body }}" type="text" name="body"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Enter Body">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputName2">Category</label>
                                            <select name="category_id" class="form-control" id="exampleInputName2">
                                                <option selected disabled value="{{$blog->category->id}}">{{$blog->category->name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Image</label>
                                            <input readonly value="{{ $blog->image }}" type="file" name="image"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Enter Image">
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
@endsection
