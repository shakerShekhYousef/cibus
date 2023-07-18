@extends('layouts.dashboard.base')
@section('pageTitle', 'Orders')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- {{ Breadcrumbs::render('orders.index') }} --}}
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
                                <h3 class="card-title">All Orders</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Hour</th>
                                        <th>People number</th>
                                        <th>Transaction id</th>
                                        <th>Payment method</th>
                                        <th>Amount</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->day}}</td>
                                        <td>{{$order->hour}}</td>
                                        <td>{{$order->people_number}}</td>
                                        <td>{{$restaurant->transaction_id}}</td>
                                        <td>{{$restaurant->payment_method}}</td>
                                        <td>{{$restaurant->amount}}</td>
                                        <td>{{$restaurant->user->full_name}}</td>
                                        <td>{{$restaurant->status}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('orders.edit',$order->id)}}" type="button"
                                                   class="btn btn-default btn-flat">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="{{route('orders.show',$order->id)}}" type="button"
                                                   class="btn btn-default btn-flat">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form method="post"
                                                      action="{{route('orders.destroy',$order->id)}}">
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
                                        <th>Day</th>
                                        <th>Hour</th>
                                        <th>People number</th>
                                        <th>Transaction id</th>
                                        <th>Payment method</th>
                                        <th>Amount</th>
                                        <th>User</th>
                                        <th>Status</th>
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
