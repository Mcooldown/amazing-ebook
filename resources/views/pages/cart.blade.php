@extends('layouts.master')

@section('title', 'Cart')

@section('content')
<h1 class="fw-bold c-text-blue mb-3">@lang('custom.navbar.cart')</h1>
<hr>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="c-bg-blue text-white">
            <th>@lang('custom.ebook.title')</th>
            <th>@lang('custom.other.action')</th>
        </thead>
        <tbody>
            @foreach ($cart as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>
                    <form class="ms-3" method="POST"
                        action="{{ route('delete-cart-item', ['id'=> $item->ebook_id, 'locale' => $locale]) }}">
                        @csrf

                        @method('DELETE')
                        <button class="btn btn-danger text-white" type="submit"
                            onclick="return confirm('Are you sure want to delete this item?')">
                            @lang('custom.other.delete')
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if(count($cart) >0)
<div class="d-flex justify-content-end mt-5">
    <form method="POST" action="{{ route('add-to-order', $locale) }}">
        @csrf
        <button type="submit" class="btn c-bg-yellow px-5">
            <h5 class="my-1">@lang('custom.other.submit')</h5>
        </button>
    </form>
</div>
@endif
@endsection
