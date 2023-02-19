@php
    $user = $comment->author;
    $userLink = route('profile', ['user' => $user]);
@endphp

<div class="comment">
    <a href="{{ $userLink }}">
        <img class="comment__avatar" src="{{ $user->avatar }}" alt="{{ $user->preferred_name }}'s Profile Picture"
            loading="lazy" decoding="async">
    </a>
    <div class="comment__holder">
        <div class="comment__info">
            <a href="{{ $userLink }}" class="comment__author">{{ $user->preferred_name }}</a>
            <span class="comment__time">{{ $comment->created_at->diffForHumans(null, false, true) }}</span>
        </div>
        <p class="comment__text">{{ $comment->commentText }}</p>
    </div>
</div>
