@props(['primary' => false, 'type' => 'button', 'onclick' => null])

<button class="control__button @if ($primary) control__button--primary @endif"
    type="{{ $type }}" @if ($onclick != null) onclick="{{ $onclick }}" @endif>
    {{ $slot }}
</button>
