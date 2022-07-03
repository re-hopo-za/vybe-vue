@extends('layouts.backend.auth.master')

@section('title', 'تایید رمزعبور')

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
                                        <h1 class="h4 text-gray-900 mb-4">فرم تایید رمزعبور</h1>
                                    </div>
                                    <form method="POST" action="{{ route('password.confirm') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="password" id="password" name="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           placeholder="رمزعبور"
                                                           required="required" autocomplete="current-password"
                                                           tabindex="1">
                                                    <label for="password">رمزعبور</label>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block" tabindex="2">
                                            تایید
                                        </button>
                                    </form>
                                    @if (Route::has('password.request'))
                                        <div class="d-flex justify-content-between">
                                            <div class="text-right">
                                                <a class="small" href="{{ route('password.request') }}" tabindex="3">فراموشی
                                                    رمزعبور</a>
                                            </div>
                                            <div class="text-left">
                                                <i class="fab fa-laravel"></i>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center mt-4">
                                            <i class="fab fa-laravel"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-confirm-image"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
