@extends('layouts.dashboard.base')
@section('pageTitle', 'Tag-' . $tag->name)
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile. {{ $tag->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- {{ Breadcrumbs::render('tags.show', $tag->id) }} --}}
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
                                <h3 class="card-title">Tag {{ $tag->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="showTag">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Name</label>
                                            <input readonly value="{{ $tag->name }}" type="text" name="name"
                                                   class="form-control" id="exampleInputName2" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Description</label>
                                            <input readonly value="{{ $tag->description }}" type="text" name="description"
                                                   class="form-control" id="exampleInputName2" placeholder="Enter Description">
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
