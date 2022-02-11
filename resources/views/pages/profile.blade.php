@extends('layouts.master')

@section('title','Profile')

@section('content')
<h1 class="fw-bold c-text-blue mb-3">@lang('custom.navbar.profile')</h1>
<hr>
<form action="{{ route('update-profile', $locale) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <img src="{{ asset('storage/display-pictures/'.$account->display_picture_link) }}" class="w-100" alt="">
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6 my-2">
                    <div class="row align-items-center">
                        <label for="first_name" class="col-md-3 mb-1">@lang('custom.form.firstName')</label>

                        <div class="col-md-9">
                            <input id="first_name" type="first_name"
                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                value="{{ $account->first_name }}">
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
                            <input id="middle_name" type="text"
                                class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                                value="{{ $account->middle_name }}">

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
                            <input id="last_name" type="text"
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="{{ $account->last_name }}">

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
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $account->email }}">

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
                                    {{ $gender->gender_id == $account->gender_id ? 'checked' : '' }}
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
                            <input type="text" class="form-control" disabled value="{{ $account->role->role_desc }}">
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
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                value="{{ $account->password }}">

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
                                class="form-control @error('display_picture') is-invalid @enderror"
                                name="display_picture" value="{{ $account->display_picture_link}}">

                            @error('display_picture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            @method('PUT')
            <button type="submit" class="btn c-bg-yellow fw-bold mt-5 w-100">
                <h5 class="my-1">@lang('custom.other.save')</h5>
            </button>
        </div>
    </div>
</form>

@endsection
