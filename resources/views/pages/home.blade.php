@extends('layouts.master')

@section('title', 'Home')

@section('content')
<h1 class="fw-bold c-text-blue mb-3">@lang('custom.navbar.home')</h1>
<hr>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="c-bg-blue text-white">
            <th>@lang('custom.ebook.author')</th>
            <th>@lang('custom.ebook.title')</th>
        </thead>
        <tbody>
            @foreach ($ebooks as $ebook)
            <tr>
                <td>{{ $ebook->author }}</td>
                <td>
                    <a href="{{ route('view-ebook-details', ['id' => $ebook->ebook_id, 'locale' => $locale]) }}"
                        class="c-text-blue">
                        {{ $ebook->title }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
