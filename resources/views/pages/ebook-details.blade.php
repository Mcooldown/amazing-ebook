@extends('layouts.master')

@section('title', 'E-book Details')

@section('content')
<h1 class="fw-bold c-text-blue mb-3">@lang('custom.navbar.ebookDetails')</h1>
<hr>

<div class="row mb-3">
    <div class="col-md-3">
        <h5 class="fw-bold">@lang('custom.ebook.title')</h5>
    </div>
    <div class="col-md-9">
        <h5 class="fw-normal">{{ $ebook->title }}
        </h5>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3">
        <h5 class="fw-bold">@lang('custom.ebook.author')</h5>
    </div>
    <div class="col-md-9">
        <h5 class="fw-normal">{{ $ebook->author }}
        </h5>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <h5 class="fw-bold">@lang('custom.ebook.description')</h5>
    </div>
    <div class="col-md-9">
        <h5 class="fw-normal">{{ $ebook->description }}
        </h5>
    </div>
</div>
<form class="d-flex justify-content-end mt-5"
    action="{{ route('add-to-cart', ['id' => $ebook->ebook_id, 'locale' => $locale]) }}" method="POST">
    @csrf
    <button type="submit" class="btn c-bg-yellow btn-lg px-5">
        <h5 class="my-1">@lang('custom.other.rent')</h5>
    </button>
</form>
@endsection
