@props(['hoverable' => true, 'navigatable' => true, 'showUser' => true])

@php
    $tagName = $navigatable == 'true' ? 'a' : 'div';
@endphp

@php
    $width = rand(300, 900);
    $height = rand(300, 900);
    $image = "https://picsum.photos/$width/$height";
    $color = 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.1);';
@endphp

<{{ $tagName }} {{ $navigatable == 'true' ? 'href=' . '/post' : '' }} class="hoverImage"
    style="--background-colour: {{ $color }}">
    <img class="hoverImage__image" src="{{ $image }}" width="{{ $width }}px" height="{{ $height }}px"
        loading="lazy" decoding="async" />
    @if ($hoverable == 'true')
        <div class="hoverImage__image--overlay">
            <div class="hoverImage__image--controls">
                @if ($showUser)
                    <div class="control control__actionable">
                        <img src="https://kierannoble.dev/assets/me.webp" loading="lazy" decoding="async">
                    </div>
                @endif
                @auth
                    <div class="control control__actionable control__actionable--active">
                        <i class="icon fa fa-thumbs-up"></i>
                    </div>
                    <div class="control control__actionable">
                        <i class="icon fa fa-thumbs-down"></i>
                    </div>
                @endauth
            </div>
        </div>
    @endif
    </{{ $tagName }}>
