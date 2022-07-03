@extends('layouts.backend.master')

@section('title', 'ایجاد تگ')

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
                        <a href="{{ route('tag.tagList') }}">
                            تگ
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">ایجاد تگ</li>
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
        <form action="{{ route('tag.tagStore') }}" method="POST" class="row">
            @csrf

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
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

            <div class="col-12">
                <a class="btn btn-outline-secondary mb-1 mb-sm-0" role="button" href="{{ route('tag.tagList') }}" tabindex="2">بازگشت</a>
                <button class="btn btn-success mb-1 mb-sm-0" type="submit" tabindex="3">ذخیره</button>
            </div>
        </form>

    </div>
@endsection
