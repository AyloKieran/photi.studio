@props(['title' => ''])
<div class="nav__section">
    @if ($title != '')
        <span class="nav__section-title">{{ $title }}</span>
    @endif
    {{ $slot }}
</div>
