@extends('layouts.dashboard.base')
@section('pageTitle', 'Edit user - ' . $user->full_name)
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit user {{ $user->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render('users.edit', $user->id) }}
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
                                <h3 class="card-title">Edit user {{ $user->full_name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="editUser" action="{{ route('users.update', $user->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input readonly value="{{ $user->email }}" type="email" name="email"
                                                   class="form-control" id="exampleInputEmail1"
                                                   placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Full name</label>
                                            <input value="{{ $user->full_name }}" type="text"
                                                   name="full_name"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Mobile phone</label>
                                            <input value="{{ $user->mobile }}" type="text" name="mobile"
                                                   class="form-control"
                                                   id="exampleInputName2" placeholder="Enter mobile phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputRole1">Select Role</label>
                                            <select name="role_id" class="form-control" id="exampleInputRole1">
                                                @foreach($roles as $role)
                                                    @if($role->id == $user->role_id)
                                                        <option selected value="{{$role->id}}">{{$role->name}}</option>
                                                    @else
                                                        <option  value="{{$role->id}}">{{$role->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
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
            $('#editUser').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 5,
                        equalTo: "#exampleInputPassword1"
                    },

                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    password_confirmation: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Password and Password Confirmation must be match"
                    }
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
