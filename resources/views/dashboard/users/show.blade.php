@extends('layouts.dashboard.base')
@section('pageTitle', 'User - ' . $user->full_name)
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile. {{ $user->full_name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render('users.show', $user->id) }}
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
                                <h3 class="card-title">User {{ $user->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="showUser">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input readonly value="{{ $user->email }}" type="email" name="email"
                                                   class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">First name</label>
                                            <input readonly value="{{ $user->full_name }}" type="text" name="full_name"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Mobile phone</label>
                                            <input readonly value="{{ $user->mobile }}" type="text" name="mobile" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter mobile phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputRole1">Select Role</label>
                                            <select name="role_id" class="form-control" id="exampleInputRole1">
                                                <option selected disabled value="{{$user->role->id}}">{{$user->role->name}}</option>
                                            </select>
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
