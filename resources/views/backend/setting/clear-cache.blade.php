@extends('layouts.backend.master')

@section('title', 'حذف حافظه‌های پنهان')

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
                            <i class="far fa-home-alt"></i>
                            تنظیمات
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">حذف حافظه‌های پنهان</li>
                </ol>
            </nav>
        </div>

        <div class="card mb-4">
            <div class="card-header pb-0">
                @include('layouts.backend.tabs.setting-tabs')
            </div>

            <div class="card-body">
                <div class="col-12">
                    <a class="btn btn-info mb-1 mb-sm-0" role="button" href="{{ route('clearView') }}">حافظه نمایشی</a>
                    <a class="btn btn-info mb-1 mb-sm-0" role="button" href="{{ route('clearRoute') }}">حافظه مسیر</a>
                    <a class="btn btn-info mb-1 mb-sm-0" role="button" href="{{ route('clearConfig') }}">حافظه پیکربندی</a>
                    <a class="btn btn-info mb-1 mb-sm-0" role="button" href="{{ route('clearCache') }}">حافظه پنهان</a>
                    <a class="btn btn-info mb-1 mb-sm-0" role="button" href="{{ route('optimize') }}">بهینه سازی</a>
                </div>
            </div>
        </div>
    </div>
@endsection
