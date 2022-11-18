@props(['title' => '', 'subtitle' => ''])

<div class="section">
    @if ($title != '')
        <span class="section__title">{{ $title }}</span>
    @endif
    @if ($subtitle != '')
        <span class="section__subtitle">{{ $subtitle }}</span>
    @endif
    <div class="section__content">
        {{ $slot }}
    </div>
</div>
