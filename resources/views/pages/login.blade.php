@extends('layouts.master')

@section('title','Login')

@section('content')
<h1 class="fw-bold c-text-blue mb-3">@lang('custom.navbar.login')</h1>
<hr>

<form action="{{ route('login', $locale) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="row align-items-center my-2">
                <label for="email" class="col-md-3 mb-1">@lang('custom.form.email')</label>

                <div class="col-md-9">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row align-items-center my-2">
                <label for="password" class="col-md-3 mb-1">@lang('custom.form.password')</label>

                <div class="col-md-9">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" value="{{old('password')}}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn c-bg-yellow fw-bold mt-4 px-5">
                <h5 class="my-1">@lang('custom.other.submit')</h5>
            </button>
            <p class="mt-4">
                <a href="{{ route('view-sign-up', $locale) }}" class="c-text-blue fw-bold">
                    @lang('custom.form.dontHaveAccount')
                </a>
            </p>
        </div>
    </div>
</form>

@endsection
