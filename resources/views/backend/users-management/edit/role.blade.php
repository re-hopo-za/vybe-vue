@extends('layouts.backend.master')

@section('title', 'نقش کاربر')

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
                    <li class="breadcrumb-item active" aria-current="page">نقش کاربر</li>
                </ol>
            </nav>
        </div>

        <div class="card mb-4">
            <div class="card-header pb-0">
                @include('layouts.backend.tabs.user-profile-tabs')
            </div>

            <div class="card-body">
                <!-- Content Row -->
                <form action="{{ route('users-management.userUpdateRole', ['user' => $user]) }}" method="POST" class="row">
                    @method('PATCH')
                    @csrf

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <select class="form-control custom-select-lg b-select @error('role') is-invalid @enderror" id="role"
                                    name="role" tabindex="1" title="انتخاب کنید" required="required">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->getRoleName()->first() == $role->name ? 'selected' : '' }}>{{ $role->name_fa }}</option>
                                @endforeach
                            </select>
                            <label for="role">نقش</label>
                            @error('role')
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
            </div>
        </div>

    </div>
@endsection
