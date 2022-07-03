@extends('layouts.backend.master')

@section('title', 'تغییر رمزعبور')

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
                    <li class="breadcrumb-item active" aria-current="page">حساب کاربری</li>
                </ol>
            </nav>
        </div>

        <div class="card mb-4">
            <div class="card-header pb-0">
                @include('layouts.backend.tabs.profile-tabs')
            </div>

            <div class="card-body">
                <form action="{{ route('profile.updatePassword', ['profile' => $profile]) }}" method="POST" class="row">
                    @csrf

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="form-label-group">
                            <input type="password" id="password_old" name="password_old"
                                   class="form-control @error('password_old') is-invalid @enderror"
                                   placeholder="رمزعبور فعلی" required="required" autocomplete="password_old"
                                   tabindex="1" autofocus="autofocus">
                            <label for="password_old">رمزعبور فعلی</label>
                            @error('password_old')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="form-label-group">
                            <input type="password" id="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="رمزعبور جدید" required="required" autocomplete="password"
                                   tabindex="2">
                            <label for="password">رمزعبور جدید</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="form-label-group">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   placeholder="تکرار رمزعبور جدید" required="required" autocomplete="password_confirmation"
                                   tabindex="3">
                            <label for="password_confirmation">تکرار رمزعبور جدید</label>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('adminPanel') }}" tabindex="4">بازگشت</a>
                        <button class="btn btn-warning mb-1 mb-sm-0" type="submit" tabindex="5">ویرایش</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
