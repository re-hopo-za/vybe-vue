@extends('layouts.backend.master')

@section('title', 'حساب کاربری')

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
                <!-- Content Row -->
                <form action="{{ route('profile.updateProfile', ['profile' => $profile]) }}" method="POST" class="row"
                      enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="form-group">
                                    <label for="avatar">تصویر</label>
                                    <input type="file" class="dropify" name="avatar" id="avatar" data-height="280"
                                           data-max-file-size="3M" data-allowed-file-extensions="jpeg jpg png"
                                           data-default-file="{{ $profile->avatar }}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="email" id="email" class="form-control" placeholder="ایمیل" disabled
                                   value="{{ $profile->email }}">
                            <label for="email">ایمیل</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="text" id="first_name" name="first_name"
                                   class="form-control @error('first_name') is-invalid @enderror"
                                   placeholder="نام" required="required" autofocus="autofocus" autocomplete="first_name"
                                   tabindex="1" value="{{ $profile->first_name }}">
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
                            <input type="text" id="last_name" name="last_name"
                                   class="form-control @error('last_name') is-invalid @enderror"
                                   placeholder="نام خانوادگی" required="required" autocomplete="last_name"
                                   tabindex="2" value="{{ $profile->last_name }}">
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
                            <select class="form-control custom-select-lg b-select @error('gender') is-invalid @enderror" id="gender"
                                    name="gender" tabindex="3" title="انتخاب کنید">
                                <option value="none" {{ $profile->gender == null ? 'selected' : '' }} hidden>هنوز انتخاب نشده</option>
                                <option value="man" {{ $profile->gender == 'man' ? 'selected' : ''  }}>مرد</option>
                                <option value="woman" {{ $profile->gender == 'woman' ? 'selected' : '' }}>زن</option>
                            </select>
                            <label for="gender">جنسیت</label>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('adminPanel') }}">بازگشت</a>
                        <button class="btn btn-warning mb-1 mb-sm-0" type="submit">ویرایش</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <!-- End of Page Content -->
@endsection
