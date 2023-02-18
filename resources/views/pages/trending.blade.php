<x-app-layout title="{{ __('Trending') }}">
    <x-header title="{{ __('Trending') }}"
        subtitle="{{ __('Have a look at some of the most popular posts from the last week') }}">
        @auth
            <x-button>
                <i class="icon fa-solid fa-filter"></i>
                {{ __('Filter') }}
            </x-button>
        @endauth
    </x-header>
    <div class="content__holder">
        <x-posts-holder>
            @php
                $man = new \App\Managers\Feed\TrendingFeedManager();
                $posts = $man->generateTrendingFeed();
            @endphp
            @foreach ($posts as $post)
                <x-hover-image :post=$post />
            @endforeach
        </x-posts-holder>
    </div>
</x-app-layout>
