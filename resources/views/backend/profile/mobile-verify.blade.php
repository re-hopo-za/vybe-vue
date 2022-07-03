@extends('layouts.backend.master')

@section('title', 'تایید شماره موبایل')

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
                        <a href="{{ route('profile.index') }}">
                            حساب کاربری
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">تایید شماره موبایل</li>
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
        <form action="#" method="POST" class="row">
            @csrf

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="form-label-group">
                    <input type="tel" id="token" name="token"
                           class="form-control @error('token') is-invalid @enderror" autofocus="autofocus"
                           placeholder="کد احراز هوییت" tabindex="1" maxlength="6"
                           oninput="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <label for="token">کد احراز هوییت</label>
                    @error('token')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-success mb-1 mb-sm-0" type="submit" tabindex="2">ذخیره</button>
            </div>
        </form>

    </div>
@endsection
