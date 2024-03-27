@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Add Supplier</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Supplier</h5>
                        <form action="{{url('admin/supplier/add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Supplier Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="supplier_name" placeholder="" class="form-control" 
                                        required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Supplier Email <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" name="supplier_email" placeholder="" class="form-control"
                                         required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Contact Number <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="contact_number" placeholder="" class="form-control" 
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Address <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="address" id="address" class="form-control" placeholder="Enter address"></textarea>
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
