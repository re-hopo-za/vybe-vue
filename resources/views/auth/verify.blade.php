@extends('layouts.backend.auth.master')

@section('title', 'تایید ایمیل')

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
                                        <h1 class="h4 text-gray-900 mb-4">تایید ایمیل</h1>
                                        <p class="mb-4 small">
                                            قبل از ادامه ، لطفاً ایمیل خود را برای لینک تأیید بررسی کنید. اگر ایمیل
                                            دریافت نکرده‌اید، برای ارسال مجدد ایمیل کلیک کنید
                                        </p>
                                    </div>
                                    @if (session('resent'))
                                        <div class="alert alert-success small" role="alert">
                                            لینک تایید ایمیل جدیدی برای آدرس ایمیل وارد شده ارسال شد
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-block" tabindex="1">
                                            ارسال مجدد
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <i class="fab fa-laravel"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-verify-image"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
