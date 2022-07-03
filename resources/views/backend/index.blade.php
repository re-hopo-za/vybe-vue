@extends('layouts.backend.master')

@section('title', 'صفحه اصلی')

@section('content')
    <!-- Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-start justify-content-start mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <i class="far fa-home-alt"></i>
                        خانه
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
        <div class="row">

            @if($message = Illuminate\Support\Facades\Session::get('login-success'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-right-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 text-right">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">مطالب</div>
                                <div class="h5 mb-0 font-weight-bold text-blue-gray-800">{{ $posts }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-blog fa-2x text-blue-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-right-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 text-right">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">سرویس‌ها</div>
                                <div class="h5 mb-0 font-weight-bold text-blue-gray-800">{{ $services }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tools fa-2x text-blue-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-right-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 text-right">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">نمونه کارها</div>
                                <div class="h5 mb-0 font-weight-bold text-blue-gray-800">{{ $works }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-images fa-2x text-blue-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-right-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 text-right">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">مشتریان</div>
                                <div class="h5 mb-0 font-weight-bold text-blue-gray-800">{{ $customers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users-crown fa-2x text-blue-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Page Content -->
@endsection
