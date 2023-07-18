@extends('layouts.dashboard.base')
@section('pageTitle', 'BlogsCategories')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blogs Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- {{ Breadcrumbs::render('blogscategories.index') }} --}}
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
                                <h3 class="card-title">All Blogs Categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogscategories as $blogcategory)
                                    <tr>
                                        <td>{{$blogcategory->name}}</td>
                                       
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('blogscategories.edit',$blogcategory->id)}}" type="button"
                                                   class="btn btn-default btn-flat">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="{{route('blogscategories.show',$blogcategory->id)}}" type="button"
                                                   class="btn btn-default btn-flat">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form method="post"
                                                      action="{{route('blogscategories.destroy',$blogcategory->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-default btn-flat"><i
                                                            class="fas fa-trash"></i> </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                       
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
