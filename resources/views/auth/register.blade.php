@extends('layouts.app')
@section('title' , 'تسجيل اشتراك ')
@section('css')
<link rel="stylesheet" href="/css/auth.css">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="form-login col-lg-6 col-md-12 col-sm-12 text-center mt-5">
                {{-- <div class="card "> --}}
                    <i class="fab fa-laravel" style="font-size:100px;color:#d10000;margin-top:20px"></i>
                    <br>
                    <h2 style="color: #d10000;" class="mt-2">
                        {{ __('Notes Management') }}
                    </h2>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-12 ">
                                    <input id="name" type="text" class=" @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required placeholder="Enter Your Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 ">
                                    <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required placeholder="Enter Your Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 ">
                                    <input id="password" type="password"
                                        class=" @error('password') is-invalid @enderror" name="password"
                                        required placeholder="Enter Your Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class=""
                                        name="password_confirmation" required placeholder="Enter Your Confirm Password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 d-flex mt-3 justify-content-around">
                                    <button type="submit" class="btn btn-lg px-5  btn-outline-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <button type="reset" class="btn btn-lg px-5   btn-outline-danger ">
                                        {{ __('Reset') }}
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <p class="text-center">OR</p>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="" class="btn btn-danger rounded m-1 p-2 pr-4 border-0">
                                        <i class="fab fa-google" style="padding:5px;"></i> Google
                                    </a>
                                    <a href="" class="btn btn-primary rounded m-1  p-2 pr-4 border-0">
                                        <i class="fab fa-facebook" style="padding:5px;"></i> Facebook
                                    </a>
                                    <a href="" class="btn btn-dark rounded m-1  p-2 pr-4 border-0">
                                        <i class="fab fa-github" style="padding:5px;"></i> Github
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection
