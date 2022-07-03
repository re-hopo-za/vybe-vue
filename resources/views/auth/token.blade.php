@extends('layouts.backend.auth.master')

@section('title', 'احراز هوییت')

@section('content')
    <div class="container lrp-form">

        <!-- Outer Row -->
        <div class="row h-100 justify-content-center align-items-center">

            <div class="col-xl-12 col-lg-12 col-md-11">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">فرم احراز هوییت</h1>
                                    </div>
                                    <form method="POST" action="{{ route('manageEnterToken') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="token" name="token" class="form-control"
                                                           placeholder="کد احراز هوییت" required="required" tabindex="1"
                                                           oninput="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                    <label for="token">کد احراز هوییت</label>
                                                    @error('token')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block">
                                            تایید
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <i class="fab fa-laravel"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-2fa-image"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
