@props(['post', 'hoverable' => true, 'navigatable' => true, 'showUser' => true])

@php
    $color = 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.1);';
@endphp

<div {{ $navigatable == 'true' ? 'onclick=navigate("' . route('post', ['post' => $post]) . '")' : '' }}
    class="hoverImage" style="--background-colour: {{ $color }}">
    <img class="hoverImage__image" src="{{ $post->image_thumbnail }}" width="{{ $post->width }}px"
        height="{{ $post->height }}px" loading="lazy" decoding="async" />
    @if ($hoverable == 'true')
        <div class="hoverImage__image--overlay">
            <div class="hoverImage__image--controls">
                @if ($showUser)
                    <a class="control control__actionable" href="{{ route('profile', ['user' => $post->author]) }}">
                        <img src="{{ $post->author->avatar }}"
                            alt="{{ $post->author->preferred_name }}'s Profile Picture" loading="lazy" decoding="async">
                    </a>
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
</div>
