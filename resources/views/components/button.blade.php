@props(['primary' => false, 'type' => 'button', 'disabled' => false, 'href' => null, 'rounded' => false, 'onclick' => null])

@php
    $tagType = isset($href) ? 'a' : 'button';
@endphp

<{{ $tagType }}
    class="control control__button @if ($primary) control__button--primary @endif @if ($rounded) control__button--rounded @endif"
    type="{{ $type }}" @if ($onclick != null) onclick="{{ $onclick }}" @endif
    @if (isset($href)) href="{{ $href }}" @endif
    @if ($disabled) disabled @endif>
    {{ $slot }}
    </{{ $tagType }}>
