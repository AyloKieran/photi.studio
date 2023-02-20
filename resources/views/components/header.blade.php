@props(['title', 'subtitle' => '', 'includeSeperator' => true])

<section class="header">
    <div class="header__holder">
        <div class="header__titles">
            <h1 class="header__title">{!! $title !!}</h1>
            @if ($subtitle != '')
                <h2 class="header__subtitle">{!! $subtitle !!}</h2>
            @endif
        </div>
        @if ($slot && $slot != '')
            <div class="header__actions">
                <div class="header__actions-holder">
                    {{ $slot }}
                </div>
            </div>
        @endif
    </div>
    @if ($includeSeperator == 'true')
        <hr class="seperator" />
    @endif
</section>
