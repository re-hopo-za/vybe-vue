@extends('layouts.backend.master')

@section('title', 'بایگانی سرویس‌ها')

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
                    <li class="breadcrumb-item active" aria-current="page">بایگانی سرویس‌ها</li>
                </ol>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
            <div class="card-body d-l">
                <!-- Service DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>تصویر</th>
                            <th>عنوان</th>
                            <th>دسته‌بندی</th>
                            <th>ایجاد کننده</th>
                            <th>وضعیت</th>
                            <th>بازگردانی</th>
                            @can('service manage')
                                <th>حذف</th>
                            @endcan
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <img class="rounded service_cover" src="{{ $service->getServiceCoverThumbAttribute() }}" alt="{{ $service->title }}" width="100">
                                </td>
                                <td>
                                    {{ $service->title }}
                                </td>
                                <td>
                                    {{ $service->category->title }}
                                </td>
                                <td>
                                    @if($service->user->id == 1)
                                        {{ $user->first_name.' '.$user->last_name }}
                                    @else
                                        {{ $service->user->first_name.' '.$service->user->last_name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($service->status == 'show')
                                        <span class="badge badge-success">فعال</span>
                                    @else
                                        <span class="badge badge-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('service.serviceRestore', $service->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf

                                        <button type="submit" class="btn btn-link p-0" onclick="return confirm('سرویس انتخاب شده بازگردانی شود؟')">
                                            <i class="far fa-inbox-out"></i>
                                        </button>
                                    </form>
                                </td>
                                @can('service manage')
                                    <td>
                                        <form action="{{ route('service.serviceTerminate', $service->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-link p-0" onclick="return confirm('سرویس انتخاب شده حذف شود؟')">
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
