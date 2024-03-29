@props(['primary' => false, 'type' => 'button', 'disabled' => false, 'href' => null, 'rounded' => false, 'onclick' => null, 'form' => null, 'onClick' => null, 'id' => null])

@php
    $tagType = isset($href) ? 'a' : 'button';
@endphp

<{{ $tagType }}
    class="control control__button @if ($primary) control__button--primary @endif @if ($rounded) control__button--rounded @endif"
    type="{{ $type }}" @if ($onclick != null) onclick="{{ $onclick }}" @endif
    @if (isset($id)) id="{{ $id }}" @endif
    @if (isset($href)) href="{{ $href }}" @endif
    @if (isset($form)) form="{{ $form }}" @endif
    @if ($disabled) disabled @endif
    @if (isset($onClick)) onclick="{{ $onClick }}" @endif>
    {{ $slot }}
    </{{ $tagType }}>
