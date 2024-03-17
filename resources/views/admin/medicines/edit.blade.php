@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Edit Medicines</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Medicines</h5>
                        <form action="{{ url('admin/medicines/edit/' . $getRecord->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name"
                                        value="{{ old('name', !empty($getRecord->name) ? $getRecord->name : '') }}"
                                        placeholder="Enter name" class="form-control" id="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Packing <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="packing"
                                        value="{{ old('packing', !empty($getRecord->packing) ? $getRecord->packing : '') }}"
                                        class="form-control" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Generic Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="generic_name"
                                        value="{{ old('generic_name', !empty($getRecord->generic_name) ? $getRecord->generic_name : '') }}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Supplier Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="supplier_name"
                                        value="{{ old('supplier_name', !empty($getRecord->supplier_name) ? $getRecord->supplier_name : '') }}"
                                        class="form-control" required>
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
