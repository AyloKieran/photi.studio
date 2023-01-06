@php
    $id = rand(0, 200);
    $width = rand(700, 1900);
    $height = rand(700, 1900);
    $image = "https://picsum.photos/id/$id/$width/$height/";
@endphp

<div class="post__image" style='--imageURL: url("{{ $image }}")'">
    <img src="{{ $image }}" width="{{ $width }}px" height="{{ $height }}px" loading="lazy"
        decoding="async">
    <div class="post__image--overlay">
        <div class="post__image--controls">
            <a href="{{ route('profile', ['user' => auth()->user()]) }}" class="control control__actionable">
                <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}" loading="lazy"
                    decoding="async">
            </a>
            @auth
                <div class="control control__actionable control__actionable--active">
                    <i class="icon fa fa-thumbs-up"></i>
                </div>
                <div class="control control__actionable">
                    <i class="icon fa fa-thumbs-down"></i>
                </div>
            @endauth
            <div class="control control__actionable">
                <i class="icon fa fa-magnifying-glass-arrow-right"></i>
            </div>
        </div>
    </div>
</div>
