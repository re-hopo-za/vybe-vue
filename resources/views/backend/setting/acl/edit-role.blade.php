@extends('layouts.backend.master')

@section('title', 'ویرایش دسترسی‌های نقش')

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
                        <a href="{{ route('setting.settingList') }}">
                            تنظیمات
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش دسترسی‌های نقش</li>
                </ol>
            </nav>
        </div>

        @if($role->id == 1)
            <div class="alert alert-danger mb-0" role="alert">
                <h4 class="alert-heading">غیرقابل ویرایش</h4>
                <hr>
                <p class="mb-0">شما دسترسی ویرایش این نقش را ندارید</p>
            </div>
        @else
            <!-- Content Row -->
            <form action="{{ route('setting.updateRole', ['role' => $role]) }}" method="POST" class="row">
                @method('PATCH')
                @csrf

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="form-label-group">
                        <select class="form-control custom-select-lg b-select @error('permission') is-invalid @enderror" id="permission"
                                name="permission[]" tabindex="1" title="انتخاب کنید" data-live-search="true" multiple
                                required="required">
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'selected' : ''}}>{{ $permission->name_fa }}</option>
                            @endforeach
                        </select>
                        <label for="permission">دسترسی‌ها</label>
                        @error('permission')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('setting.acl') }}">بازگشت</a>
                    <button class="btn btn-warning mb-1 mb-sm-0" type="submit">ویرایش</button>
                </div>

            </form>
        @endif
    </div>
@endsection
