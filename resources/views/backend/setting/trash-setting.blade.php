@extends('layouts.backend.master')

@section('title', 'بایگانی تنظیمات')

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
                    <li class="breadcrumb-item active" aria-current="page">بایگانی</li>
                </ol>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
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
                            <th>بازگردانی</th>
                            @can('setting manage')
                                <th>حذف</th>
                            @endcan
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
                                <td>
                                    {{ $setting->value_1 }}
                                </td>
                                <td>
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
                                        <span class="badge badge-success">فعال</span>
                                    @else
                                        <span class="badge badge-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('setting.settingRestore', $setting->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf

                                        <button type="submit" class="btn btn-link p-0" onclick="return confirm('مورد انتخاب شده بازگردانی شود؟')">
                                            <i class="far fa-inbox-out"></i>
                                        </button>
                                    </form>
                                </td>
                                @can('setting manage')
                                    <td>
                                        <form action="{{ route('setting.settingTerminate', $setting->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-link p-0" onclick="return confirm('مورد انتخاب شده حذف شود؟')">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
