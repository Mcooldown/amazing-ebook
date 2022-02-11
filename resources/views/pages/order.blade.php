@extends('layouts.master')

@section('title', 'Order')

@section('content')
<h1 class="fw-bold c-text-blue mb-3">@lang('custom.navbar.order')</h1>
<hr>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="c-bg-blue text-white">
            <th>@lang('custom.ebook.title')</th>
            <th>@lang('custom.ebook.order_date')</th>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->ebook->title }}</td>
                <td>{{ $order->order_date }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
