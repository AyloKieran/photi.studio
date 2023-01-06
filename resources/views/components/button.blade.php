@props(['primary' => false, 'type' => 'button', 'rounded' => false, 'onclick' => null])

<button
    class="control__button @if ($primary) control__button--primary @endif @if ($rounded) control__button--rounded @endif"
    type="{{ $type }}" @if ($onclick != null) onclick="{{ $onclick }}" @endif>
    {{ $slot }}
</button>
