@props(['label' => null])

<input id="pageContent__aside--open" type="checkbox">
<aside class="pageContent__aside">
    <label for="pageContent__aside--open">
        <i class="icon fa-solid fa-chevron-right"></i>

        @if (isset($label))
            <span class="pageContent__aside-label">{{ $label }}</span>
        @endif

    </label>
    {{ $slot }}
</aside>
