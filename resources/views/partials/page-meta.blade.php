@php
    $browserTitle = mb_strtoupper($pageTitle ?? 'AURA', 'UTF-8');
@endphp

<title>{{ $browserTitle }}</title>

<link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="{{ asset('favicon.png') }}"
>
