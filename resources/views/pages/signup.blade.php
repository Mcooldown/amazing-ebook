@extends('layouts.master')

@section('title','Sign Up')

@section('content')
<h1 class="fw-bold c-text-blue mb-3">@lang('custom.navbar.signup')</h1>
<hr>

<form action="{{ route('sign-up', $locale) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 my-2">
            <div class="row align-items-center">
                <label for="first_name" class="col-md-3 mb-1">@lang('custom.form.firstName')</label>

                <div class="col-md-9">
                    <input id="first_name" type="first_name"
                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                        value="{{ old('first_name') }}">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6 my-2">
            <div class="row align-items-center">
                <label for="middle_name" class="col-md-3 mb-1">@lang('custom.form.middleName')</label>

                <div class="col-md-9">
                    <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror"
                        name="middle_name" value="{{ old('middle_name') }}">

                    @error('middle_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6 my-2">
            <div class="row align-items-center">
                <label for="last_name" class="col-md-3 mb-1">@lang('custom.form.lastName')</label>

                <div class="col-md-9">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ old('last_name') }}">

                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6 my-2">
            <div class="row align-items-center">
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
        </div>
        <div class="col-md-6 my-2">
            <div class="mb-4 row align-items-center">
                <label for="gender" class="col-md-3 mb-1">@lang('custom.form.gender')</label>

                <div class="col-md-9 d-flex">
                    @foreach ($genders as $gender)
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" name="gender"
                            {{ $gender->gender_id == old('gender') ? 'checked' : '' }}
                            id="gender{{ $gender->gender_id }}" value="{{ $gender->gender_id }}">

                        <label class="form-check-label" for="gender{{ $gender->gender_id }}">
                            {{ $gender->gender_desc }}
                        </label>
                    </div>
                    @endforeach
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6 my-2">
            <div class="row align-items-center">
                <label for="role" class="col-md-3 mb-1">@lang('custom.form.role')</label>

                <div class="col-md-9">
                    <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                        <option value="">@lang('custom.form.choose')</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->role_id }}" {{ $role->role_id == old('role') ? 'selected' : '' }}>
                            {{ $role->role_desc }}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6 my-2">
            <div class="row align-items-center">
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
        </div>
        <div class="col-md-6 my-2">
            <div class="row align-items-center">
                <label for="display_picture" class="col-md-3 mb-1">@lang('custom.form.displayPicture')</label>

                <div class="col-md-9">
                    <input id="display_picture" type="file"
                        class="form-control @error('display_picture') is-invalid @enderror" name="display_picture"
                        value="{{old('display_picture')}}">

                    @error('display_picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn c-bg-yellow mt-5 w-100">
        <h5 class="my-1">@lang('custom.other.submit')</h5>
    </button>
    <p class="text-center mt-4">
        <a href="{{ route('view-login',$locale) }}" class="c-text-blue fw-bold">
            @lang('custom.form.alreadyHaveAccount')
        </a>
    </p>
</form>
@endsection
