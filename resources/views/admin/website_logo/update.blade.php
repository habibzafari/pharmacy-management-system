@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>My Logo</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Website Logo</h5>
                        <form action="{{url('admin/website_logo_update')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="website_name" class="form-control" required value="{{$getRecord->website_name}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Website Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="logo" class="form-control" id="formFile">
                                    @if(!empty($getRecord->logo))
                                        <img src="{{$getRecord->getLogo()}}" width="100px" height="100px">
                                    @endif
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
