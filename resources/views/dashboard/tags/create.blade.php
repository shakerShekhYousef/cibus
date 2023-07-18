@extends('layouts.dashboard.base')
@section('pageTitle', 'Create new tag')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create new tag</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- {{ Breadcrumbs::render('tags.create') }} --}}
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
                                <h3 class="card-title">Create new tag</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="createTag" action="{{ route('tags.store') }}" method="post">
                                @csrf
                                @method("POST")
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Name</label>
                                        <input value="{{ old('name') }}"  type="text" name="name" class="form-control" id="exampleInputName2"
                                               placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName2">Description</label>
                                        <input value="{{ old('description') }}"  type="text" name="description" class="form-control" id="exampleInputName2"
                                               placeholder="Enter Description">
                                    </div>
                                  
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create</button>
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
        $(function() {
            $('#createTag').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: "Please enter a name",
                    },
                    description: {
                        required: "Please enter a description",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
@endsection
