@extends('layouts.backend.master')

@section('title', 'ایجاد')

@section('content')
    <!-- Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-start justify-content-start mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item">
                        <a href="{{ route('adminPanel') }}">
                            <i class="far fa-home-alt"></i>
                            خانه
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.customerList') }}">
                            مشتریان
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">ایجاد</li>
                </ol>
            </nav>
        </div>

        <div class="card mb-4">
            <div class="card-body">

                <!-- Content Row -->
                <form action="{{ route('customer.customerStore') }}" method="POST" class="row" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="form-group">
                                    <label for="customer_avatar">تصویر</label>
                                    <input type="file" class="dropify" name="customer_avatar" id="customer_avatar" required="required"
                                           data-max-file-size="3M" data-allowed-file-extensions="jpeg jpg png"
                                           data-height="280"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="text" id="fullname" name="fullname" class="form-control @error('fullname') is-invalid @enderror"
                                   placeholder="نام و نام‌خانوادگی" required="required" autofocus="autofocus" autocomplete="fullname"
                                   tabindex="1" value="{{ old('fullname') }}">
                            <label for="fullname">نام و نام‌خانوادگی</label>
                            @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="text" id="job" name="job" class="form-control @error('job') is-invalid @enderror"
                                   placeholder="شغل" required="required" autocomplete="job" tabindex="2" value="{{ old('job') }}">
                            <label for="job">شغل</label>
                            @error('job')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="ایمیل" autocomplete="email" tabindex="3" value="{{ old('email') }}">
                            <label for="email">ایمیل</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="text" id="mobile" name="mobile" class="form-control @error('mobile') is-invalid @enderror"
                                   placeholder="موبایل" autocomplete="mobile" tabindex="4" value="{{ old('mobile') }}"
                                   oninput="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                   maxlength="11" autocomplete="mobile">
                            <label for="mobile">موبایل</label>
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <select class="form-control custom-select-lg b-select @error('gender') is-invalid @enderror" id="gender"
                                    name="gender" tabindex="5" title="انتخاب کنید" required="required">
                                <option value="man">مرد</option>
                                <option value="woman">زن</option>
                            </select>
                            <label for="gender">جنسیت</label>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <div class="form-control custom-switch @error('status') is-invalid @enderror">
                                <input type="checkbox" class="custom-control-input" id="status" name="status" tabindex="6">
                                <span class="switch-label">وضعیت انتشار</span>
                                <label class="custom-control-label" for="status"></label>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-label-group">
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message"
                                      rows="5" tabindex="7" placeholder="خلاصه مطلب" required="required">
                                {{ old('message') }}
                            </textarea>
                            <label for="message">پیام مشتری</label>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('customer.customerList') }}" tabindex="8">بازگشت</a>
                        <button class="btn btn-success mb-1 mb-sm-0" type="submit" tabindex="9">ذخیره</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
