@extends('layouts.dashboard.base')
@section('pageTitle', 'Create new order')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create new order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- {{ Breadcrumbs::render('orders.create') }} --}}
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
                                <h3 class="card-title">Create new order</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="createOrder" action="{{ route('orders.store') }}" method="post">
                                @csrf
                                @method("POST")
                                <div class="card-body">
                                    
                                    <div class="form-group">
                                        <label for="exampleInputName2">Day</label>
                                        <input value="{{ old('day') }}" type="text" name="day" class="form-control"
                                               id="exampleInputName2" placeholder="Enter Day">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName2">Hour</label>
                                        <input value="{{ old('hour') }}" type="text" name="hour" class="form-control"
                                               id="exampleInputName2" placeholder="Enter Hour">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName2">People number</label>
                                        <input value="{{ old('people_number') }}" type="text" name="people_number" class="form-control"
                                               id="exampleInputName2" placeholder="Enter People number">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName2">Transaction id</label>
                                        <input value="{{ old('transaction_id') }}" type="text" name="transaction_id" class="form-control"
                                               id="exampleInputName2" placeholder="Enter Transaction id">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName2">Payment method</label>
                                        <input value="{{ old('payment_method') }}" type="text" name="payment_method" class="form-control"
                                               id="exampleInputName2" placeholder="Enter Payment method">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="exampleInputName2">Amount</label>
                                        <input value="{{ old('amount') }}" type="text" name="amount" class="form-control"
                                               id="exampleInputName2" placeholder="Enter Amount">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="exampleInputRole1">Select User</label>
                                        <select name="user_id" class="form-control" id="exampleInputRole1">
                                            <option selected disabled>Please Select User</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName2">Status</label>
                                        <input value="{{ old('status') }}" type="text" name="status" class="form-control"
                                               id="exampleInputName2" placeholder="Enter Status">
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
            $('#createOrder').validate({
                rules: {
                    day: {
                        required: true,
                    },
                    hour: {
                        required: true,
                    },
                    people_number: {
                        required: true,
                       
                    },
                    transaction_id: {
                        required: true,
                    },
                    payment_method: {
                        required: true,
                    },
                   
                    amount: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                   

                },
                messages: {
                    day: {
                        required: "Please enter a day",
                    },
                    hour: {
                        required: "Please enter an hour",
                    },
                    people_number: {
                        required: "Please enter a people number",
                    },
                    transaction_id: {
                        required: "Please enter a transaction id",
                    },
                    payment_method: {
                        required: "Please enter a payment method",
                    },
                    amount: {
                        required: "Please enter an amount",
                    },
                    status: {
                        required: "Please enter a status",
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
