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
                <form action="{{ route('profile.manageTwoFA') }}" method="POST" class="row">
                    @csrf

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="tel" id="mobile" name="mobile"
                                   class="form-control @error('mobile') is-invalid @enderror" autofocus="autofocus"
                                   placeholder="شماره موبایل" autocomplete="mobile" tabindex="1"
                                   value="{{ $profile->mobile }}"
                                   oninput="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                   maxlength="11">
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
                            <select class="form-control custom-select-lg b-select  @error('two_fa_type') is-invalid @enderror"
                                    id="two_fa_type" name="two_fa_type" tabindex="2" title="انتخاب کنید">
                                @foreach(config('two-fa-type.types') as $key => $name)
                                    <option
                                        value="{{ $key }}" {{ auth()->user()->hasTwoFA($key) ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            <label for="two_fa_type">احراز هوییت دو مرحله‌ای</label>
                            @error('two_fa_type')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('adminPanel') }}" tabindex="3">بازگشت</a>
                        <button class="btn btn-warning mb-1 mb-sm-0" type="submit"tabindex="4">ویرایش</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <!-- End of Page Content -->
@endsection
