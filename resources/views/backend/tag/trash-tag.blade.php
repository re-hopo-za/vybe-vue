@extends('layouts.backend.master')

@section('title', 'بایگانی تگ‌ها')

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
                    <li class="breadcrumb-item active" aria-current="page">بایگانی تگ‌ها</li>
                </ol>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
            <div class="card-body d-l">
                <!-- Tag DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان</th>
                            <th>بازگردانی</th>
                            @can('tag manage')
                                <th>حذف</th>
                            @endcan
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $tag->title }}
                                </td>
                                <td>
                                    <form action="{{ route('tag.tagRestore', $tag->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf

                                        <button type="submit" class="btn btn-link p-0" onclick="return confirm('تگ انتخاب شده بازگردانی شود؟')">
                                            <i class="far fa-inbox-out"></i>
                                        </button>
                                    </form>
                                </td>
                                @can('tag manage')
                                    <td>
                                        <form action="{{ route('tag.tagTerminate', $tag->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-link p-0"
                                                    onclick="return confirm('تگ انتخاب شده بایگانی شود؟')">
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
