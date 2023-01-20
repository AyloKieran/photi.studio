@php
    $color = 'rgba(' . $post->r . ', ' . $post->g . ', ' . $post->b . ', 0.25);';
@endphp

@php
    use App\Models\User;
    $user = User::first();
@endphp

<div class="post__image" style='--imageURL: url("{{ $post->image_original }}"); --background-colour: {{ $color }}'>
    <img src="{{ $post->image_original }}" width="{{ $post->width }}px" height="{{ $post->height }}px"
        alt="{{ $post->caption }}" loading="lazy" decoding="async">
    <div class="post__image--overlay">
        <div class="post__image--controls">
            <a href="{{ route('profile', ['user' => $post->author]) }}" class="control control__actionable">
                <img src="{{ $post->author->avatar }}" alt="{{ $post->author->preferred_name }}'s Profile Picture"
                    loading="lazy" decoding="async">
            </a>
            @auth
                <div class="control control__actionable control__actionable--active">
                    <i class="icon fa fa-thumbs-up"></i>
                </div>
                <div class="control control__actionable">
                    <i class="icon fa fa-thumbs-down"></i>
                </div>
            @endauth
            {{-- <a href="{{ route('search.post', ['post' => $post]) }}" class="control control__actionable">
                <i class="icon fa fa-magnifying-glass-arrow-right"></i>
            </a> --}}
        </div>
    </div>
</div>
