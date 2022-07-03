@extends('layouts.backend.master')

@section('title', 'گزارش فعالیت‌ها')

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
                    <li class="breadcrumb-item active" aria-current="page">گزارش فعالیت‌ها</li>
                </ol>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
                <div class="card-body d-l">
                    <!-- Log DataTable -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>log_name</th>
                                <th>description</th>
                                <th>subject_id</th>
                                <th>subject_type</th>
                                <th>causer_id</th>
                                <th>causer_type</th>
                                <th>properties</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $log->log_name }}</td>
                                    <td>{{ $log->description }}</td>
                                    <td>{{ $log->log_name }}</td>
                                    <td>{{ $log->subject_type }}</td>
                                    <td>{{ $log->causer_id }}</td>
                                    <td>{{ $log->causer_type }}</td>
                                    <td>{{ $log->properties }}</td>
                                    <td>{{ $log->created_at }}</td>
                                    <td>{{ $log->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
@endsection
