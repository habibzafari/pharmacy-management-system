@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Add Purchase</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Purchases</h5>
                        <form action="{{url('admin/purchases/add')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Supplier Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="supplier_id" class="form-control" required>
                                        <option value="">Select Customers Name</option>
                                        @foreach ($getSupplier as $value1)
                                            <option value="{{$value1->id}}">{{$value1->supplier_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Invoice ID <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="invoices_id" class="form-control" required>
                                        <option value="">Select Invoice ID</option>
                                        @foreach ($getInvoice as $value2)
                                            <option value="{{$value2->id}}">{{$value2->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Voucher Number <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="voucher_number" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Purchase date <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="purchase_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Total Amount <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_amount" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Payment Status <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="payment_status" class="form-control" required>
                                        <option value="">Select Payment Status</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Accept</option>
                                        <option value="3">Cancel</option>
                                        {{-- @foreach ($getRecord as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"> 
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
