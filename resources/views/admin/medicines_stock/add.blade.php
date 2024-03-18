@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Add Medicines Stock</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Medicine Stock</h5>
                        <form action="{{url('admin/medicines_stock/add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Madicine Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="medicines_id" class="form-control" required>
                                        <option value="">Select</option>
                                        @foreach ($getRecord as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Batch ID <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="batch_id" placeholder="" class="form-control" 
                                        required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Expiry Date <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="expiry_date" placeholder="" class="form-control"
                                         required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Quantity <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="quantity" placeholder="" class="form-control" 
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">MRP <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="mrp" placeholder="" class="form-control" 
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Rate <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="rate" placeholder="" class="form-control" 
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
