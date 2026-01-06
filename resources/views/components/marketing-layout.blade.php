@props(['title' => null])

@php
    $title = $title ?? config('app.name', 'Profit Maximization Consultancy');
@endphp

@include('layouts.marketing', [
    'title' => $title,
    'slot' => $slot,
])

