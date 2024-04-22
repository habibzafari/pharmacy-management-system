@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Add Invoice</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Invoice</h5>
                        <form action="{{url('admin/invoices/add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Customers Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="customers_id" class="form-control" required>
                                        <option value="">Select Customers Name</option>
                                        @foreach ($getRecord as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Net Total <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="net_total" class="form-control" 
                                        required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Invoices Date <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="invoices_date" class="form-control"
                                         required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Total Amoun <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_amount" class="form-control" 
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Total Discount <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_discount" class="form-control" 
                                        required>
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