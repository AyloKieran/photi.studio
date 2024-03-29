@props(['post', 'hoverable' => true, 'navigatable' => true, 'showUser' => true])

@php
    if ($hoverable == 'true') {
        $selfRating = $post->userRating?->rating ?? null;
        $liked = $selfRating == \App\Enums\PostRatingEnum::LIKE->value;
        $disliked = $selfRating == \App\Enums\PostRatingEnum::DISLIKE->value;
    
        $likeFormID = 'likeForm' . $post->id;
        $dislikeFormID = 'dislikeForm' . $post->id;
        $noneFormID = 'noneForm' . $post->id;
    }
@endphp

<div {{ $navigatable == 'true' ? 'onclick=navigate("' . route('post', ['post' => $post]) . '")' : '' }}
    class="hoverImage" style="--r: {{ $post->r }}; --g: {{ $post->g }}; --b: {{ $post->b }}">
    <img class="hoverImage__image" src="{{ $post->image_thumbnail }}" width="{{ $post->width }}px"
        height="{{ $post->height }}px" alt="{{ $post->caption }}" loading="lazy" decoding="async"
        onerror="this.style.opacity='0'; this.parentElement.style.setProperty('--opacity', '.5')"
        onContextMenu="return false;" />
    @if ($hoverable == 'true')
        <div class="hoverImage__image--overlay">
            <form method="POST" action="{{ route('post.like', ['post' => $post]) }}" id="{{ $likeFormID }}">
                @csrf
            </form>
            <form method="POST" action="{{ route('post.dislike', ['post' => $post]) }}" id="{{ $dislikeFormID }}">
                @csrf
            </form>
            <form method="POST" action="{{ route('post.none', ['post' => $post]) }}" id="{{ $noneFormID }}">
                @csrf
            </form>
            <div class="hoverImage__image--controls">
                @if ($showUser)
                    <a class="control control__actionable" href="{{ route('profile', ['user' => $post->author]) }}">
                        <img src="{{ $post->author->avatar }}"
                            alt="{{ $post->author->preferred_name }}'s Profile Picture" loading="lazy"
                            decoding="async">
                    </a>
                @endif
                @auth
                    <button type="submit" form="{{ $liked ? $noneFormID : $likeFormID }}"
                        aria-label="{{ $liked ? 'Unlike' : 'Like' }}"
                        class="control control__actionable @if ($liked) control__actionable--active @endif">
                        <i class="icon fa fa-thumbs-up"></i>
                    </button>
                    <button type="submit" form="{{ $disliked ? $noneFormID : $dislikeFormID }}"
                        aria-label="{{ $disliked ? 'Undislike' : 'Dislike' }}"
                        class="control control__actionable @if ($disliked) control__actionable--active @endif">
                        <i class="icon fa fa-thumbs-down"></i>
                    </button>
                @endauth
            </div>
        </div>
    @endif
</div>
