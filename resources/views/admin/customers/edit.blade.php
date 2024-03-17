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
                        <form action="{{url('admin/customers/edit/'.$getRecord->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{old('name',!empty($getRecord->name) ? $getRecord->name : '')}}" placeholder="Enter name" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" >Contact Number <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="contact_number" value="{{old('contact_number',!empty($getRecord->contact_number) ? $getRecord->contact_number : '')}}" placeholder="ex +93 799 999 999" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control">{{old('address',!empty($getRecord->address) ? $getRecord->address : '')}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Doctor Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="doctor_name" value="{{old('doctor_name',!empty($getRecord->doctor_name) ? $getRecord->doctor_name : '')}}" placeholder="Enter Doctor Name" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Doctor Address</label>
                                <div class="col-sm-10">
                                    <textarea name="doctor_address" class="form-control">{{old('doctor_address',!empty($getRecord->doctor_address) ? $getRecord->doctor_address : '')}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"> 
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
