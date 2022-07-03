@extends('layouts.backend.master')

@section('title', 'مدیریت کاربران')

@section('content')
    <!-- Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-start justify-content-between mb-4">
            <nav aria-label="breadcrumb" class="mb-3 mb-sm-0">
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item">
                        <a href="{{ route('adminPanel') }}">
                            <i class="far fa-home-alt"></i>
                            خانه
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">مدیریت کاربران</li>
                </ol>
            </nav>
            <div class="actions">
                <a class="btn btn-success btn-sm" href="{{ route('users-management.userCreate') }}">
                    <i class="fas fa-user-plus"></i>
                    ایجاد کاربر
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
            <div class="card-header pb-0">
                @include('layouts.backend.tabs.users-tabs')
            </div>

            <div class="card-body d-l">
                <!-- User DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>تصویر</th>
                            <th>نام و نام‌خانوادگی</th>
                            <th>نقش</th>
                            <th>تاریخ عضویت</th>
                            <th>ویرایش</th>
                            <th>وضعیت</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <img class="rounded-circle post_cover" src="{{ $user->getAvatarThumbAttribute() }}" alt="{{ $user->first_name }}" width="50" height="50">
                                </td>
                                <td>
                                    {{ $user->first_name . ' ' . $user->last_name }}
                                </td>
                                <td>
                                    {{ $user->getRoleNameFa()->first() }}
                                </td>
                                <td>
                                    {{ verta($user->created_at)->formatDate() }}
                                </td>
                                <td>
                                    <a href="{{ route('users-management.userEdit', $user->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    @if($user->getRoleName()->first() != 'Super Admin')
                                        @if(empty($user->deleted_at))
                                            <form action="{{ route('users-management.userSuspend', $user->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button type="submit" class="btn btn-link p-0"
                                                        onclick="return confirm('کاربر انتخاب شده غیرفعال شود؟')">
                                                    <span class="badge badge-success">فعال</span>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('users-management.userUnsuspend', $user->id) }}" method="POST">
                                                @csrf

                                                <button type="submit" class="btn btn-link p-0"
                                                        onclick="return confirm('کاربر انتخاب شده فعال شود؟')">
                                                    <span class="badge badge-danger">غیرفعال</span>
                                                </button>
                                            </form>
                                        @endif
                                    @endif
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
