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
                        <a href="{{ route('setting.settingList') }}">
                            تنظیمات عمومی
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">ایجاد</li>
                </ol>
            </nav>
        </div>

        <div class="card mb-4">
            <div class="card-body">

                <!-- Content Row -->
                <form action="{{ route('setting.settingStore') }}" method="POST" class="row" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="setting_cover">تصویر</label>
                                    <input type="file" class="dropify" name="setting_cover" id="setting_cover"
                                           data-max-file-size="3M" data-allowed-file-extensions="jpeg jpg png svg"
                                           data-height="280"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                                   placeholder="عنوان" required="required" autofocus="autofocus" autocomplete="title"
                                   tabindex="1" value="{{ old('title') }}">
                            <label for="title">عنوان</label>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <select class="form-control custom-select-lg b-select @error('type') is-invalid @enderror" id="type"
                                    name="type" tabindex="2" required="required" title="انتخاب کنید" data-live-search="true">
                                @foreach(config('setting-type.types') as $key => $name)
                                    <option value="{{ $key }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <label for="type">نوع</label>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <div class="form-control custom-switch @error('link_status') is-invalid @enderror">
                                <input type="checkbox" class="custom-control-input" id="link_status" name="link_status" tabindex="3">
                                <span class="switch-label">لینک خارجی</span>
                                <label class="custom-control-label" for="link_status"></label>
                                @error('link_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <div class="form-control custom-switch @error('status') is-invalid @enderror">
                                <input type="checkbox" class="custom-control-input" id="status" name="status" tabindex="4">
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
                        <div class="form-group">
                            <label for="value_1">مقدار 1</label>
                            <textarea name="value_1" id="value_1" class="text" rows="4" tabindex="5">{!! old('value_1') !!}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="value_2">مقدار 2</label>
                            <textarea name="value_2" id="value_2" class="text" rows="4" tabindex="6">{!! old('value_2') !!}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('setting.settingList') }}" tabindex="7">بازگشت</a>
                        <button class="btn btn-success mb-1 mb-sm-0" type="submit" tabindex="8">ذخیره</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection

@section('page-script')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/backend/setting/setting-scripts.min.js') }}"></script>
@endsection
