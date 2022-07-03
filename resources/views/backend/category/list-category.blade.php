@extends('layouts.backend.master')

@section('title', 'لیست دسته‌بندی‌ها')

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
                    <li class="breadcrumb-item active" aria-current="page">لیست دسته‌بندی‌ها</li>
                </ol>
            </nav>

            <div class="actions">
                <a class="btn btn-success btn-sm" href="{{ route('category.categoryCreate') }}">
                    <i class="fas fa-plus"></i>
                    ایجاد
                </a>

                <a class="btn btn-secondary btn-sm" href="{{ route('category.categoryTrash') }}">
                    <i class="fas fa-inbox"></i>
                    بایگانی
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
            <div class="card-body d-l">
                <!-- Category DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان</th>
                            <th>والد</th>
                            <th>ویرایش</th>
                            <th>بایگانی</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $category->title }}
                                </td>
                                <td>
                                    @if ($category->parent_id == 0)
                                        ---
                                    @else
                                        {{ \App\Models\Category::find($category->parent_id)->title }}
                                    @endif
                                </td>
                                <td>
                                    @if($category->id > 3)
                                        <a href="{{ route('category.categoryEdit', $category->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @else
                                        &nbsp;
                                    @endif
                                </td>
                                <td>
                                    @if($category->id > 3)
                                        <form action="{{ route('category.categoryDestroy', $category->id) }}"
                                              method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-link p-0"
                                                    onclick="return confirm('دسته‌بندی انتخاب شده بایگانی شود؟')">
                                                <i class="far fa-inbox-in"></i>
                                            </button>
                                        </form>
                                    @else
                                        &nbsp;
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
