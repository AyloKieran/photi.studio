@props(['title' => '', 'subtitle' => '', 'href' => null])

<div class="section">
    @if ($title != '')
        @if ($href != null)
            <a class="section__title" href="{{ $href }}">
                {!! $title !!}
                <i class="icon fa-solid fa-caret-right"></i>
            </a>
        @else
            <span class="section__title">{!! $title !!}</span>
        @endif
    @endif
    @if ($subtitle != '')
        <span class="section__subtitle">{!! $subtitle !!}</span>
    @endif
    <div class="section__content">
        {{ $slot }}
    </div>
</div>
