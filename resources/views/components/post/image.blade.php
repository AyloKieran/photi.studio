@php
    $id = rand(0, 200);
    $width = rand(700, 1900);
    $height = rand(700, 1900);
    $image = "https://picsum.photos/id/$id/$width/$height/";
    $color = 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.1);';
@endphp

@php
    use App\Models\User;
    $user = User::first();
@endphp

<div class="post__image" style='--imageURL: url("{{ $image }}"); --background-colour: {{ $color }}'">
    <img src="{{ $image }}" width="{{ $width }}px" height="{{ $height }}px" loading="lazy"
        decoding="async">
    <div class="post__image--overlay">
        <div class="post__image--controls">
            <a href="{{ route('profile', ['user' => $user]) }}" class="control control__actionable">
                <img src="{{ $user->avatar }}" alt="{{ $user->preferred_name }}'s Profile Picture" loading="lazy"
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
            <a href="{{ route('search.post', ['post' => $id]) }}" class="control control__actionable">
                <i class="icon fa fa-magnifying-glass-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
