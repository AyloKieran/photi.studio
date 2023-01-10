@php
    use App\Models\User;
    $user = User::where('username', '@AyloKieran')->first();
@endphp

<a href="{{ route('profile', ['user' => $user]) }}" class="search__card search__card--user">
    <img src="{{ $user->avatar }}" alt="{{ $user->preferred_name }}" loading="lazy" decoding="async">
    <span class="search__card-title">{{ $user->name }}</span>
    <span class="search__card-subtitle">{{ $user->username }}</span>
</a>
