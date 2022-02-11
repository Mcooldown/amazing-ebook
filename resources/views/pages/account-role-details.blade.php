@extends('layouts.master')

@section('title', 'Account Role Details')

@section('content')
<h1 class="fw-bold c-text-blue mb-3">{{ $account->first_name }} {{ $account->middle_name }} {{ $account->last_name }}
</h1>
<hr>
<form action="{{ route('update-role', ['id'=> $account->account_id, 'locale' => $locale]) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 my-2">
            <div class="row align-items-center">
                <label for="role" class="col-md-3 mb-1">@lang('custom.form.role')</label>

                <div class="col-md-9">
                    <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                        <option value="">@lang('custom.form.choose')</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->role_id }}"
                            {{ $role->role_id == $account->role_id ? 'selected' : '' }}>
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
            @method('PUT')
            <button type="submit" class="btn c-bg-yellow fw-bold mt-5 px-5">
                <h5 class="my-1">@lang('custom.other.save')</h5>
            </button>
        </div>
    </div>
</form>
@endsection
