@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Customers</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer</h5>
                        <form action="{{url('admin/customers/add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" placeholder="Enter name" class="form-control" id="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" >Contact Number <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="contact_number" placeholder="ex +93 799 999 999" class="form-control" id="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" id="address" class="form-control" placeholder="Enter address"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Doctor Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="doctor_name" placeholder="Enter Doctor Name" class="form-control" id="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Doctor Address</label>
                                <div class="col-sm-10">
                                    <textarea name="doctor_address" id="doctor_address" class="form-control" placeholder="Enter doctor address"></textarea>
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
