@extends('layouts.master')

@section('title', 'Account Maintenance')

@section('content')
<h1 class="fw-bold c-text-blue mb-3">@lang('custom.navbar.accountMaintenance')</h1>
<hr>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="c-bg-blue text-white">
            <th>@lang('custom.other.account')</th>
            <th>@lang('custom.other.action')</th>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
            <tr>
                <td>{{ $account->first_name }} {{ $account->middle_name }} {{ $account->last_name }} -
                    {{ $account->role->role_desc }}</td>
                @if ($account->account_id != Auth::id())
                <td class="d-flex">
                    <a href="{{ route('view-account-role-details', ['id'=> $account->account_id, 'locale' => $locale]) }}"
                        class="btn c-bg-yellow">@lang('custom.other.updateRole')</a>
                    <form class="ms-3" method="POST"
                        action="{{ route('delete-account', ['id'=> $account->account_id, 'locale' => $locale]) }}">
                        @csrf

                        @method('DELETE')
                        <button class="btn btn-danger text-white" type="submit"
                            onclick="return confirm('Are you sure want to delete this account?')">
                            @lang('custom.other.delete')
                        </button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
