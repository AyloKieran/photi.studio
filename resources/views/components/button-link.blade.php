@props(['href', 'primary' => false])

<a class="control__button @if ($primary) control__button--primary @endif" href="{{ $href }}">
    {{ $slot }}
</a>
