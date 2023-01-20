@props(['navFriendly' => false, 'navigatable' => false])

@php
    $tagType = $navigatable ? 'a' : 'div';
@endphp

<{{ $tagType }} @if ($navigatable) href="{{ route('home') }}" @endif
    class="logo @if ($navFriendly) logo--navFriendly @endif">
    PHOTI
    </{{ $tagType }}>
