@extends('layouts.backend.master')

@section('title', 'ویرایش دسته‌بندی')

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
                        <a href="{{ route('category.categoryList') }}">
                            دسته‌بندی
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش دسته‌بندی</li>
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
        <form action="{{ route('category.categoryUpdate', ['category' => $category]) }}" method="POST" class="row">
            @method('PATCH')
            @csrf

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-label-group">
                    <input type="text" id="title" name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           placeholder="عنوان" required="required" autofocus="autofocus" autocomplete="title"
                           tabindex="1" value="{{ $category->title }}">
                    <label for="title">عنوان</label>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-label-group">
                    <select class="form-control custom-select-lg b-select @error('parent_id') is-invalid @enderror" id="parent_id"
                            name="parent_id" tabindex="2" title="انتخاب کنید" data-live-search="true">
                        @foreach($categories as $cat)
                            @if($cat->id != $category->id)
                                <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>{{ $cat->title }}</option>
                            @endif
                        @endforeach
                    </select>
                    <label for="parent_id">زیر دسته</label>
                    @error('parent_id')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="form-label-group">
                    <textarea class="form-control @error('summary') is-invalid @enderror" name="summary" id="summary"
                              rows="5" tabindex="3" placeholder="توضیحات کوتاه" required="required">
                        {{ $category->summary }}
                    </textarea>
                    <label for="summary">توضیحات کوتاه</label>
                    @error('summary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="form-label-group">
                    <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description"
                              id="meta_description" rows="5" tabindex="4" placeholder="توضیحات سئو" required="required">
                        {{ $category->meta_description }}
                    </textarea>
                    <label for="meta_description">توضیحات سئو</label>
                    @error('meta_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="form-label-group">
                    <textarea class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword"
                              id="meta_keyword" rows="5" tabindex="5" placeholder="کلمات کلیدی سئو" required="required">
                        {{ $category->meta_keyword }}
                    </textarea>
                    <label for="meta_keyword">کلمات کلیدی سئو</label>
                    @error('meta_keyword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('category.categoryList') }}" tabindex="6">بازگشت</a>
                <button class="btn btn-warning mb-1 mb-sm-0" type="submit" tabindex="7">ویرایش</button>
            </div>

        </form>

    </div>
@endsection
