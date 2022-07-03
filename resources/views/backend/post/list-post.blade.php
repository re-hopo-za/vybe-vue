@extends('layouts.backend.master')

@section('title', 'لیست مطالب')

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
                    <li class="breadcrumb-item active" aria-current="page">لیست مطالب</li>
                </ol>
            </nav>

            <div class="actions">
                <a class="btn btn-success btn-sm" href="{{ route('post.create.createDefault') }}">
                    <i class="fas fa-plus"></i>
                    ایجاد
                </a>

                <a class="btn btn-secondary btn-sm" href="{{ route('post.postTrash') }}">
                    <i class="fas fa-inbox"></i>
                    بایگانی
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
            <div class="card-body d-l">
                <!-- Post DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>تصویر</th>
                            <th>عنوان</th>
                            <th>دسته‌بندی</th>
                            <th>نوع</th>
                            <th>ایجاد کننده</th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                            <th>بایگانی</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    @switch($post->type)
                                        @case('quote')
                                        ---
                                        @break

                                        @case('audio')
                                        ---
                                        @break

                                        @case('video')
                                        <video width="100" class="rounded">
                                            <source src="{{ $post->getFirstMediaUrl('post_cover') }}" type="video/mp4">
                                            مرورگر شما از این فایل ویدئویی پشتیبانی نمی‌کند
                                        </video>
                                        @break

                                        @default
                                        <img class="rounded post_cover" src="{{ $post->getPostCoverThumbAttribute() }}" alt="{{ $post->title }}" width="100">
                                    @endswitch
                                </td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{ $post->category->title }}
                                </td>
                                <td>
                                    @switch($post->type)
                                        @case('quote')
                                        نقل قول
                                        @break

                                        @case('audio')
                                        صوتی
                                        @break

                                        @case('video')
                                        ویدئویی
                                        @break

                                        @default
                                        معمولی
                                    @endswitch
                                </td>
                                <td>
                                    @if($post->user->id == 1)
                                        {{ $user->first_name.' '.$user->last_name }}
                                    @else
                                        {{ $post->user->first_name.' '.$post->user->last_name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($post->status == 'show')
                                        <span class="badge badge-success">نمایش</span>
                                    @else
                                        <span class="badge badge-danger">پیش‌نویس</span>
                                    @endif
                                </td>
                                <td>
                                    @switch($post->type)
                                        @case('quote')
                                        <a href="{{ route('post.edit.editQuote', $post->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        @break

                                        @case('audio')
                                        <a href="{{ route('post.edit.editAudio', $post->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        @break

                                        @case('video')
                                        <a href="{{ route('post.edit.editVideo', $post->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        @break

                                        @default
                                        <a href="{{ route('post.edit.editDefault', $post->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endswitch
                                </td>
                                <td>
                                    <form action="{{ route('post.postDestroy', $post->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-link p-0"
                                                onclick="return confirm('مطلب انتخاب شده بایگانی شود؟')">
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
