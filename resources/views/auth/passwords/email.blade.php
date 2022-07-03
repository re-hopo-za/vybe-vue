@extends('layouts.backend.auth.master')

@section('title', 'فراموشی رمزعبور')

@section('content')
    <div class="container lrp-form">

        <!-- Outer Row -->
        <div class="row h-100 justify-content-center align-items-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">فرم بازنشانی رمزعبور</h1>
                                        <p class="mb-4 small">
                                            رمزعبور خود را فراموش کرده‌اید!
                                            <br>
                                            کافیست ایمیل خود را وارد کنید و ما لینکی برای بازنشانی رمزعبور برای شما
                                            ارسال خواهیم کرد.
                                        </p>
                                    </div>
                                    @if (session('status'))
                                        <div class="alert alert-success small" role="alert">
                                            لینک احراز هوییت برای تغییر رمزعبور به ایمیل وارد شده ارسال شد
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="form-label-group">
                                            <input type="email" id="email" name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   placeholder="ایمیل" required="required"
                                                   autofocus="autofocus" autocomplete="email" tabindex="1"
                                                   value="{{ old('email') }}">
                                            <label for="email">ایمیل</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block" tabindex="2">
                                            ارسال لینک
                                        </button>
                                    </form>
                                    <hr>
                                    @if (Route::has('login'))
                                        <div class="d-flex justify-content-between">
                                            <div class="text-right">
                                                <a class="small" href="{{ route('login') }}" tabindex="5">صفحه
                                                    ورود</a>
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
                            <div class="col-lg-6 d-none d-lg-block bg-password-1-image"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
