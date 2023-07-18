@extends('layouts.dashboard.base')
@section('pageTitle', 'Dishes')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dishes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render('dishes.index') }}
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
                                <h3 class="card-title">All Dishes</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Restaurant</th>
                                        <th>Rating</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dishes as $dish)
                                        <tr>
                                            <td>
                                                @if($dish->image)
                                                    <img style="width: 100px"
                                                         src="{{asset('/storage/images/dishes/'.$dish->restaurant->restaurant_name.'/'.$dish->image)}}"/>
                                                @else
                                                    Empty
                                                @endif
                                            </td>
                                            <td>{{$dish->name}}</td>
                                            <td>{{$dish->category->name}}</td>
                                            <td>{{$dish->restaurant->restaurant_name}}</td>
                                            <td>{{$dish->rating ? $dish->rating : "Empty"}}</td>
                                            <td>{{$dish->price}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('dishes.edit',$dish->id)}}" type="button"
                                                       class="btn btn-default btn-flat">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="{{route('dishes.show',$dish->id)}}" type="button"
                                                       class="btn btn-default btn-flat">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <form method="post"
                                                          action="{{route('dishes.destroy',$dish->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-default btn-flat"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Restaurant</th>
                                        <th>Rating</th>
                                        <th>Price</th>
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
