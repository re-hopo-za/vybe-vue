@extends('layouts.backend.master')

@section('title', 'کوتاه کننده لینک')

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
                    <li class="breadcrumb-item active" aria-current="page">کوتاه کننده لینک</li>
                </ol>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="card p-0">
            <div class="card-header">
                <form action="{{ route('short-link.shortLinkStore') }}" method="POST" class="row">
                    @csrf

                    <div class="col-sm-12 col-md-3">
                        <div class="form-label-group mb-2 mb-sm-0">
                            <input type="text" id="title" name="title" class="form-control" placeholder="عنوان"
                                   required="required" autocomplete="title" tabindex="1" value="{{ old('title') }}">
                            <label for="title">عنوان</label>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-7">
                        <div class="form-label-group mb-2 mb-sm-0">
                            <input type="url" id="link" name="link" class="form-control" placeholder="لینک"
                                   required="required" autocomplete="link" tabindex="1" value="{{ old('link') }}">
                            <label for="link">لینک</label>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <button class="btn btn-success btn-block" type="submit" tabindex="2">ذخیره</button>
                    </div>
                </form>
            </div>

            <div class="card-body d-l">
                <!-- Short Link DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان</th>
                            <th>لینک کوتاه شده</th>
                            <th>لینک اصلی</th>
                            @can('short link manage')
                                <th>حذف</th>
                            @endcan
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($links as $link)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $link->title }}
                                    </td>
                                    <td>
                                        <a href="{{ route('shortenLink', $link->code) }}" target="_blank">{{ route('shortenLink', $link->code) }}</a>
                                    </td>
                                    <td>
                                        {{ $link->link }}
                                    </td>
                                    @can('short link manage')
                                        <td>
                                            <form action="{{ route('short-link.shortLinkDestroy', $link->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button type="submit" class="btn btn-link p-0"
                                                        onclick="return confirm('لینک انتخاب شده حذف شود؟')">
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
