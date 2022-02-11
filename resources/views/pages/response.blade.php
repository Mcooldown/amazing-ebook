@extends('layouts.master')

@section('title', 'Response')

@section('content')

<div class="circle">
    <div>
        <h1 class="fw-bold text-center">
            @if (session('message'))
            {{ session('message') }}
            @else
            @lang('custom.other.noMessage')
            @endif
        </h1>
        @if (session('route') && session('messageLink'))
        <div class="text-center mt-3">
            <a href="{{ route(session('route'), $locale) }}">{{ session('messageLink') }}</a>
        </div>
        @endif
    </div>
</div>

@endsection
