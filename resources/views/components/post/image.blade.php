@php
    $liked = $post->selfRating() == \App\Enums\PostRatingEnum::LIKE->value;
    $disliked = $post->selfRating() == \App\Enums\PostRatingEnum::DISLIKE->value;
@endphp

<div class="post__image"
    style='--imageURL: url("{{ $post->image_original }}"); --r: {{ $post->r }}; --g: {{ $post->g }}; --b: {{ $post->b }}'>
    <img src="{{ $post->image_original }}" width="{{ $post->width }}px" height="{{ $post->height }}px"
        alt="{{ $post->caption }}" loading="lazy" decoding="async">
    <div class="post__image--overlay">
        <form method="POST" action="{{ route('post.like', ['post' => $post]) }}" id="likeForm">
            @csrf
        </form>
        <form method="POST" action="{{ route('post.dislike', ['post' => $post]) }}" id="dislikeForm">
            @csrf
        </form>
        <form method="POST" action="{{ route('post.none', ['post' => $post]) }}" id="noneForm">
            @csrf
        </form>
        <div class="post__image--controls">
            <a href="{{ route('profile', ['user' => $post->author]) }}" class="control control__actionable">
                <img src="{{ $post->author->avatar }}" alt="{{ $post->author->preferred_name }}'s Profile Picture"
                    loading="lazy" decoding="async">
            </a>
            @auth
                <button type="submit" form="{{ $liked ? 'noneForm' : 'likeForm' }}"
                    class="control control__actionable @if ($liked) control__actionable--active @endif">
                    <i class="icon fa fa-thumbs-up"></i>
                </button>
                <button type="submit" form="{{ $disliked ? 'noneForm' : 'dislikeForm' }}"
                    class="control control__actionable @if ($disliked) control__actionable--active @endif">
                    <i class="icon fa fa-thumbs-down"></i>
                </button>
            @endauth
        </div>
    </div>
</div>
