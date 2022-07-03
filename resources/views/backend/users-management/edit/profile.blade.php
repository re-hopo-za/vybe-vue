@extends('layouts.backend.master')

@section('title', 'ویرایش کاربر')

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
                    <li class="breadcrumb-item active" aria-current="page">ویرایش کاربر</li>
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
                    <!-- Content Row -->
                    <form action="{{ route('users-management.userUpdate', ['user' => $user]) }}" method="POST"
                          class="row" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="avatar">تصویر</label>
                                        <input type="file" class="dropify" name="avatar" id="avatar" data-height="280"
                                               data-max-file-size="3M" data-allowed-file-extensions="jpeg jpg png"
                                               data-default-file="{{ $user->avatar }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="form-label-group">
                                <input type="text" id="first_name" name="first_name" placeholder="نام"
                                       required="required"
                                       class="form-control @error('first_name') is-invalid @enderror"
                                       autofocus="autofocus" autocomplete="first_name" tabindex="1"
                                       value="{{ $user->first_name }}">
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
                                <input type="text" id="last_name" name="last_name" placeholder="نام خانوادگی"
                                       autocomplete="last_name"
                                       class="form-control @error('last_name') is-invalid @enderror" required="required"
                                       tabindex="2" value="{{ $user->last_name }}">
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
                                <input type="email" id="email" name="email" placeholder="ایمیل" autocomplete="email"
                                       tabindex="3"
                                       class="form-control @error('email') is-invalid @enderror" required="required"
                                       value="{{ $user->email }}">
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
                                <input type="tel" id="mobile" name="mobile"
                                       class="form-control @error('mobile') is-invalid @enderror" autofocus="autofocus"
                                       placeholder="شماره موبایل" autocomplete="mobile" tabindex="4"
                                       value="{{ $user->mobile }}" maxlength="11"
                                       oninput="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                <label for="mobile">شماره موبایل</label>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="form-label-group">
                                <select class="form-control custom-select-lg b-select @error('gender') is-invalid @enderror"
                                        id="gender"
                                        name="gender" tabindex="5" title="انتخاب کنید">
                                    <option value="none" {{ $user->gender == null ? 'selected' : '' }} hidden>هنوز
                                        انتخاب نشده
                                    </option>
                                    <option value="man" {{ $user->gender == 'man' ? 'selected' : ''  }}>مرد</option>
                                    <option value="woman" {{ $user->gender == 'woman' ? 'selected' : '' }}>زن</option>
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
                            <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button"
                               href="{{ route('users-management.index') }}">بازگشت</a>
                            <button class="btn btn-warning mb-1 mb-sm-0" type="submit">ویرایش</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

    </div>
@endsection
