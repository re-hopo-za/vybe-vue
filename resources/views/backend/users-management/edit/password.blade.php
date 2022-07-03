@extends('layouts.backend.master')

@section('title', 'تغییر رمزعبور کاربر')

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
                    <li class="breadcrumb-item active" aria-current="page">تغییر رمزعبور کاربر</li>
                </ol>
            </nav>
        </div>

        <div class="card mb-4">
            <div class="card-header pb-0">
                @include('layouts.backend.tabs.user-profile-tabs')
            </div>

            <div class="card-body">
                @if($user->id == 1)
                    <div class="alert alert-danger mb-0" role="alert">
                        <h4 class="alert-heading">غیرقابل ویرایش</h4>
                        <hr>
                        <p class="mb-0">شما دسترسی ویرایش این کاربر را ندارید</p>
                    </div>
                @else
                    <form action="{{ route('users-management.userUpdatePassword', ['user' => $user]) }}" method="POST" class="row">
                        @csrf

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-label-group">
                                <input type="password" id="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="رمزعبور جدید" required="required" autocomplete="password">
                                <label for="password">رمزعبور جدید</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('users-management.index') }}">بازگشت</a>
                            <button class="btn btn-warning mb-1 mb-sm-0" type="submit">ویرایش</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

    </div>
@endsection
