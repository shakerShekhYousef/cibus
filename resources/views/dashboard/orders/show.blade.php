@extends('layouts.dashboard.base')
@section('pageTitle', 'Order-' . $order->day)
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile. {{ $order->day }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- {{ Breadcrumbs::render('orders.show', $order->id) }} --}}
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
                                <h3 class="card-title">Order {{ $order->day }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="showOrder">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Day</label>
                                            <input readonly value="{{ $order->day }}" type="text" name="day"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Enter day">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputName2">Hour</label>
                                            <input readonly value="{{ $order->Hour }}" type="text" name="hour"
                                                   class="form-control" id="exampleInputName2"
                                                   placeholder="Enter hour">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">People number</label>
                                            <input readonly value="{{ $order->people_number }}" type="text" name="people_number" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter people number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Transaction id</label>
                                            <input readonly value="{{ $order->transaction_id }}" type="text" name="transaction_id" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter transaction id">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Payment method</label>
                                            <input readonly value="{{ $order->payment_method }}" type="text" name="payment_method" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter payment method">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputName2">Amount</label>
                                            <input readonly value="{{ $order->amount }}" type="text" name="amount" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter amount">
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <label for="exampleInputRole1">Select User</label>
                                            <select name="user_id" class="form-control" id="exampleInputRole1">
                                                <option selected disabled value="{{$order->user->id}}">{{$order->user->full_name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName2">Status</label>
                                            <input readonly value="{{ $order->status }}" type="text" name="status" class="form-control"
                                                   id="exampleInputName2" placeholder="Enter status">
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
