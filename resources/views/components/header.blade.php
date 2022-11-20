@props(['title', 'subtitle' => ''])

<section class="header">
    <h1 class="header__title">{{ $title }}</h1>
    @if ($subtitle != '')
        <h2 class="header__subtitle">{{ $subtitle }}</h2>
    @endif
    <hr class="seperator" />
</section>
