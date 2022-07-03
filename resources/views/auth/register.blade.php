@extends('layouts.backend.auth.master')

@section('title', 'ثبت نام')

@section('content')
    <div class="container lrp-form">

        <!-- Outer Row -->
        <div class="row h-100 justify-content-center align-items-center">

            <div class="col-xl-12 col-lg-12 col-md-11">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">فرم ثبت‌نام</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-6 mb-sm-0">
                                                <div class="form-label-group">
                                                    <input type="text" id="first_name" name="first_name"
                                                           class="form-control @error('first_name') is-invalid @enderror"
                                                           placeholder="نام"
                                                           required="required" autofocus="autofocus"
                                                           autocomplete="first_name" tabindex="1"
                                                           value="{{ old('first_name') }}">
                                                    <label for="first_name">نام</label>
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-label-group">
                                                    <input type="text" id="last_name" name="last_name"
                                                           class="form-control @error('last_name') is-invalid @enderror"
                                                           placeholder="نام‌خانوادگی" required="required"
                                                           autocomplete="last_name" tabindex="2"
                                                           value="{{ old('last_name') }}">
                                                    <label for="last_name">نام‌خانوادگی</label>
                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="email" id="email" name="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           placeholder="ایمیل"
                                                           required="required" autocomplete="email" tabindex="3"
                                                           value="{{ old('email') }}">
                                                    <label for="email">ایمیل</label>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-sm-0">
                                                <div class="form-label-group">
                                                    <input type="password" id="password" name="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           placeholder="رمزعبور"
                                                           required="required" autocomplete="new-password" tabindex="4">
                                                    <label for="password">رمزعبور</label>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-label-group">
                                                    <input type="password" id="password_confirmation"
                                                           name="password_confirmation" class="form-control"
                                                           placeholder="تکرار رمزعبور"
                                                           required="required" autocomplete="new-password" tabindex="5">
                                                    <label for="password_confirmation">تکرار رمزعبور</label>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block" tabindex="6">
                                            ثبت‌نام
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <i class="fab fa-laravel"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
