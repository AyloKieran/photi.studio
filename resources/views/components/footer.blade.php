@props(['title', 'subtitle' => '', 'includeSeperator' => true])

<section class="footer">
    @if ($includeSeperator == 'true')
        <hr class="seperator" />
    @endif
    <div class="footer__holder">
        {{ $slot }}
    </div>
</section>
