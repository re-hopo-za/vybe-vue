@extends('layouts.backend.master')

@section('title', 'بایگانی مشتریان')

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
                    <li class="breadcrumb-item active" aria-current="page">بایگانی مشتریان</li>
                </ol>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
            <div class="card-body d-l">
                <!-- Customer DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>تصویر</th>
                            <th>نام و نام‌خانوادگی</th>
                            <th>شغل</th>
                            <th>جنسیت</th>
                            <th>وضعیت</th>
                            <th>ایجاد کننده</th>
                            <th>بازگردانی</th>
                            @can('customer manage')
                                <th>حذف</th>
                            @endcan
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <img class="rounded customer_avatar" src="{{ $customer->getCustomerAvatarThumbAttribute() }}" alt="{{ $customer->fullname }}" width="100">
                                </td>
                                <td>
                                    {{ $customer->fullname }}
                                </td>
                                <td>
                                    {{ $customer->job }}
                                </td>
                                <td>
                                    @if ($customer->gender == 'man')
                                        مرد
                                    @else
                                        زن
                                    @endif
                                </td>
                                <td>
                                    @if ($customer->status == 'show')
                                        <span class="badge badge-success">فعال</span>
                                    @else
                                        <span class="badge badge-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td>
                                    @if($customer->user->id == 1)
                                        {{ $user->first_name.' '.$user->last_name }}
                                    @else
                                        {{ $customer->user->first_name.' '.$customer->user->last_name }}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('customer.customerRestore', $customer->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf

                                        <button type="submit" class="btn btn-link p-0" onclick="return confirm('مشتری انتخاب شده بازگردانی شود؟')">
                                            <i class="far fa-inbox-out"></i>
                                        </button>
                                    </form>
                                </td>
                                @can('customer manage')
                                    <td>
                                        <form action="{{ route('customer.customerTerminate', $customer->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-link p-0" onclick="return confirm('مشتری انتخاب شده حذف شود؟')">
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
