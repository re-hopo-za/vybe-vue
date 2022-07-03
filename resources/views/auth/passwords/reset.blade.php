@extends('layouts.backend.auth.master')

@section('title', 'تغییر رمزعبور')

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
                                        <h1 class="h4 text-gray-900 mb-4">فرم تغییر رمزعبور</h1>
                                    </div>
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="email" id="email" name="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           placeholder="ایمیل"
                                                           required="required" tabindex="1"
                                                           value="{{ $email ?? old('email') }}" autocomplete="email"
                                                           autofocus="autofocus">
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
                                                           required="required" tabindex="2" autocomplete="new-password">
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
                                                           required="required" tabindex="3" autocomplete="new-password">
                                                    <label for="password_confirmation">تکرار رمزعبور</label>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                                            تغییر رمزعبور
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <i class="fab fa-laravel"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-password-2-image"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
