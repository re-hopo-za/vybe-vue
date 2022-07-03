@extends('layouts.backend.master')

@section('title', 'لیست تگ‌ها')

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
                    <li class="breadcrumb-item active" aria-current="page">لیست تگ‌ها</li>
                </ol>
            </nav>

            <div class="actions">
                <a class="btn btn-success btn-sm" href="{{ route('tag.tagCreate') }}">
                    <i class="fas fa-plus"></i>
                    ایجاد
                </a>

                <a class="btn btn-secondary btn-sm" href="{{ route('tag.tagTrash') }}">
                    <i class="fas fa-inbox"></i>
                    بایگانی
                </a>
            </div>
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
                            <th>ویرایش</th>
                            <th>بایگانی</th>
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
                                        <a href="{{ route('tag.tagEdit', $tag->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('tag.tagDestroy', $tag->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-link p-0"
                                                    onclick="return confirm('تگ انتخاب شده بایگانی شود؟')">
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
