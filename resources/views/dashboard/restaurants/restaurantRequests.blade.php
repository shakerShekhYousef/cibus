@extends('layouts.dashboard.base')
@section('pageTitle', 'Restaurants Requests')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Restaurants</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render('restaurants.index') }}
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Restaurants</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Owner name</th>
                                        <th>Owner Email</th>
                                        <th>Restaurant Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>User</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($restaurants as $restaurant)
                                        <tr>
                                            <td>{{$restaurant->owner_name}}</td>
                                            <td>{{$restaurant->owner_email}}</td>
                                            <td>{{$restaurant->restaurant_name}}</td>
                                            <td>{{$restaurant->address}}</td>
                                            <td>{{$restaurant->city->name}}</td>
                                            <td>{{$restaurant->user ? $restaurant->user->full_name : "Empty" }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form method="post"
                                                          action="{{route('restaurants.requests.active',$restaurant->id)}}">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-default btn-flat"><i
                                                                class="fas fa-toggle-on"></i> </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Owner name</th>
                                        <th>Owner Email</th>
                                        <th>Restaurant Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>User</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
