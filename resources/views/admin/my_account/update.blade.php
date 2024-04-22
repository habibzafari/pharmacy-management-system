@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>My Account</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile Update</h5>
                        <form action="{{url('admin/my_account')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required value="{{$getRecord->name}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" required value="{{$getRecord->email}}">
                                    <span style="color:red;">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="profile_image" class="form-control" id="formFile">
                                    @if(!empty($getRecord->profile_image))
                                        <img src="{{$getRecord->getProfileImage()}}" width="100px" height="100px">
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control">
                                    (Leave it blank if you don't want to change password)
                                    <span style="color:red;">{{ $errors->first('password') }}</span>
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
