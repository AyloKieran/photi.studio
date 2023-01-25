@php
    use App\Models\User;
    $user = auth()->user() ?? User::first();
@endphp

@php
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
            <span class="comment__time">2d ago</span>
        </div>
        <p class="comment__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
</div>
