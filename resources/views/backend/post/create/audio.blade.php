@extends('layouts.backend.master')

@section('title', 'ایجاد مطلب صوتی')

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
                    <li class="breadcrumb-item">
                        <a href="{{ route('post.postList') }}">
                            مطلب
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">ایجاد مطلب صوتی</li>
                </ol>
            </nav>
        </div>

        <div class="card mb-4">
            <div class="card-header pb-0">
                @include('layouts.backend.tabs.post-tabs')
            </div>

            <div class="card-body">

                <!-- Content Row -->
                <form action="{{ route('post.postStore') }}" method="POST" class="row" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="audio" name="type" id="type">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="post_cover">فایل صوتی</label>
                                    <input type="file" class="dropify" name="post_cover" id="post_cover" required="required"
                                           data-max-file-size="50M" data-allowed-file-extensions="mpeg mp3"
                                           data-height="280"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                                   placeholder="عنوان" required="required" autofocus="autofocus" autocomplete="title"
                                   tabindex="1" value="{{ old('title') }}">
                            <label for="title">عنوان</label>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <select class="form-control custom-select-lg b-select @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id" tabindex="2" required="required" title="انتخاب کنید" data-live-search="true">
                                <optgroup label="Post's Categories">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                                </optgroup>
                            </select>
                            <label for="category_id">دسته‌بندی</label>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <div class="form-control custom-switch @error('status') is-invalid @enderror">
                                <input type="checkbox" class="custom-control-input" id="status" name="status" tabindex="3">
                                <span class="switch-label">وضعیت انتشار</span>
                                <label class="custom-control-label" for="status"></label>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-label-group">
                            <select class="form-control custom-select-lg b-select @error('tag') is-invalid @enderror" id="tags"
                                    name="tags[]" title="انتخاب کنید" data-live-search="true" multiple data-max-options="4"
                                    tabindex="5" required="required">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                            <label for="tags">تگ‌ها</label>
                            @error('tags')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12" id="link_row"></div>

                    <div class="col-12">
                        <div class="form-label-group">
                            <textarea class="form-control @error('summary') is-invalid @enderror" name="summary" id="summary"
                                      rows="5" tabindex="8" placeholder="خلاصه مطلب" required="required">
                                {{ old('summary') }}
                            </textarea>
                            <label for="summary">خلاصه مطلب</label>
                            @error('summary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="text">مطلب کامل</label>
                            <textarea name="text" id="text" class="text" rows="5" tabindex="9">{!! old('text') !!}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('post.postList') }}" tabindex="10">بازگشت</a>
                        <button class="btn btn-success mb-1 mb-sm-0" type="submit" tabindex="11">ذخیره</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection

@section('page-script')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/backend/post/post-create-scripts.min.js') }}"></script>
@endsection
