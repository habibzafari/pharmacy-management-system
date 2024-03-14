@extends('layouts.app')
@section('content')
    <div class="card mb-3">

        <div class="card-body">

            <div class="pt-4 pb-2">
                @include('_message')
                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                <p class="text-center small">Enter your Email & password to login</p>
            </div>

            <form method="POST" action="{{ url('forgot_post') }}" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">Please enter your Email.</div>
                    </div>
                </div>


                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
                <div class="col-12">
                    {{-- <p class="small mb-0">Don't have account? <a href="{{url('register')}}">Create an account</a></p> --}}
                    <p class="small mb-0">Already have an account? <a href="{{ url('/') }}">Login here</a></p>
                </div>
            </form>

        </div>
    </div>
@endsection
