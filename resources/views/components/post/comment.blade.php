@php
    use App\Models\User;
    $user = User::where('username', '@AyloKieran')->first();
@endphp

@php
    $userLink = route('profile', ['user' => $user]);
@endphp

<div class="comment">
    <a href="{{ $userLink }}">
        <img class="comment__avatar" src="{{ $user->avatar }}" alt="{{ $user->preferred_name }}" loading="lazy"
            decoding="async">
    </a>
    <div class="comment__holder">
        <div class="comment__info">
            <a href="{{ $userLink }}" class="comment__author">@AyloKieran</a>
            <span class="comment__time">2d ago</span>
        </div>
        <p class="comment__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
</div>
