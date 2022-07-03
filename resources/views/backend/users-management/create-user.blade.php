@extends('layouts.backend.master')

@section('title', 'ایجاد کاربر')

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
                        <a href="{{ route('users-management.index') }}">
                            مدیریت کاربران
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">ایجاد کاربر</li>
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
        <form action="{{ route('users-management.userStore') }}" method="POST" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="avatar">تصویر</label>
                            <input type="file" class="dropify" name="avatar" id="avatar" data-height="280"
                                   data-max-file-size="3M" data-allowed-file-extensions="jpeg jpg png" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="form-label-group">
                    <input type="text" id="first_name" name="first_name" placeholder="نام" required="required"
                           class="form-control @error('first_name') is-invalid @enderror"
                           autofocus="autofocus" autocomplete="first_name" tabindex="1" value="{{ old('first_name') }}">
                    <label for="first_name">نام</label>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="form-label-group">
                    <input type="text" id="last_name" name="last_name" placeholder="نام خانوادگی" autocomplete="last_name"
                           class="form-control @error('last_name') is-invalid @enderror" required="required"
                           tabindex="2" value="{{ old('last_name') }}">
                    <label for="last_name">نام خانوادگی</label>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="form-label-group">
                    <input type="email" id="email" name="email" placeholder="ایمیل" autocomplete="email" tabindex="3"
                           class="form-control @error('email') is-invalid @enderror" required="required"
                           value="{{ old('email') }}">
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
                    <input type="password" id="password" name="password" placeholder="رمزعبور" required="required"
                           class="form-control @error('password') is-invalid @enderror"
                           autocomplete="password" tabindex="4">
                    <label for="password">رمزعبور</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('adminPanel') }}">بازگشت</a>
                <button class="btn btn-success mb-1 mb-sm-0" type="submit">ذخیره</button>
            </div>

        </form>

    </div>
@endsection
