@extends('layouts.backend.master')

@section('title', 'سطح دسترسی')

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
                    <li class="breadcrumb-item active" aria-current="page">تنظیمات</li>
                </ol>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
            <div class="card-header pb-0">
                @include('layouts.backend.tabs.users-tabs')
            </div>

            <div class="card-body d-l">
                <!-- ACL DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نقش</th>
                            <th>دسترسی‌ها</th>
                            <th>ویرایش</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $role->name_fa }}
                                </td>
                                <td>
                                    @if(count($role->permissions))
                                        @foreach($role->permissions as $permission)
                                            {{ $permission->name_fa }} /
                                        @endforeach
                                    @else
                                        ---
                                    @endif
                                </td>
                                <td>
                                    @if($role->name != 'Super Admin')
                                        <a href="{{ route('setting.editRole', $role->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
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
