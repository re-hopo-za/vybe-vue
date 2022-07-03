@extends('layouts.backend.master')

@section('title', 'تنظیمات')

@section('content')
    <!-- Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-start justify-content-between mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item">
                        <a href="{{ route('adminPanel') }}">
                            <i class="far fa-home-alt"></i>
                            خانه
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">تنظیمات</li>
                </ol>
            </nav>

            <div class="actions">
                <a class="btn btn-success btn-sm" href="{{ route('setting.settingCreate') }}">
                    <i class="fas fa-plus"></i>
                    ایجاد
                </a>

                <a class="btn btn-secondary btn-sm" href="{{ route('setting.settingTrash') }}">
                    <i class="fas fa-inbox"></i>
                    بایگانی
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
            <div class="card-header pb-0">
                @include('layouts.backend.tabs.setting-tabs')
            </div>

            <div class="card-body d-l">
                <!-- Setting DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>تصویر</th>
                            <th>عنوان</th>
                            <th>نوع</th>
                            <th>مقدار 1</th>
                            <th>مقدار 2</th>
                            <th>ایجاد کننده</th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                            <th>بایگانی</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($settings as $setting)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    @if($setting->type != 'contact' and $setting->type != 'social')
                                        <img class="rounded setting_cover" src="{{ $setting->getSettingCoverThumbAttribute() }}" alt="{{ $setting->title }}" width="100">
                                    @else
                                        <img class="rounded setting_cover" src="{{ $setting->getSettingCoverAttribute() }}" alt="{{ $setting->title }}" width="42">
                                    @endif
                                </td>
                                <td>
                                    {{ $setting->title }}
                                </td>
                                <td>
                                    {{ $setting->type }}
                                </td>
                                <td dir="ltr">
                                    {{ $setting->value_1 }}
                                </td>
                                <td dir="ltr">
                                    {{ $setting->value_2 }}
                                </td>
                                <td>
                                    @if($setting->user->id == 1)
                                        {{ $user->first_name.' '.$user->last_name }}
                                    @else
                                        {{ $setting->user->first_name.' '.$setting->user->last_name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($setting->status == 'show')
                                        <span class="badge badge-success">نمایش</span>
                                    @else
                                        <span class="badge badge-danger">پیش‌نویس</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('setting.settingEdit', $setting->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('setting.settingDestroy', $setting->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-link p-0"
                                                onclick="return confirm('مورد انتخاب شده بایگانی شود؟')">
                                            <i class="far fa-inbox-in"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
