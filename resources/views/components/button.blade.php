@props(['primary' => false, 'type' => 'button'])

<button class="control__button @if ($primary) control__button--primary @endif"
    type="{{ $type }}">
    {{ $slot }}
</button>
