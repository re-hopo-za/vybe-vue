@extends('layouts.backend.master')

@section('title', 'بایگانی مطالب')

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
                    <li class="breadcrumb-item active" aria-current="page">بایگانی مطالب</li>
                </ol>
            </nav>
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
                            <th>ایجاد کننده</th>
                            <th>وضعیت</th>
                            <th>بازگردانی</th>
                            @can('post manage')
                                <th>حذف</th>
                            @endcan
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
                                    @if($post->user->id == 1)
                                        {{ $user->first_name.' '.$user->last_name }}
                                    @else
                                        {{ $post->user->first_name.' '.$post->user->last_name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($post->status == 'show')
                                        <span class="badge badge-success">فعال</span>
                                    @else
                                        <span class="badge badge-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('post.postRestore', $post->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf

                                        <button type="submit" class="btn btn-link p-0" onclick="return confirm('مطلب انتخاب شده بازگردانی شود؟')">
                                            <i class="far fa-inbox-out"></i>
                                        </button>
                                    </form>
                                </td>
                                @can('post manage')
                                    <td>
                                        <form action="{{ route('post.postTerminate', $post->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-link p-0" onclick="return confirm('مطلب انتخاب شده حذف شود؟')">
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
