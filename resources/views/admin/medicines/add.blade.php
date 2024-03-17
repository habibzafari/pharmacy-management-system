@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Add Medicines</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Medicine</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Madicine Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" placeholder="Enter name" class="form-control" id="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" >Packing <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="packing" placeholder="" class="form-control" id="name" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Generic Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="generic_name" placeholder="" class="form-control" id="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Supplier Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="supplier_name" placeholder="" class="form-control" id="name" required>
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
