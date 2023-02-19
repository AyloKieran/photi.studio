<x-app-layout title="{{ __('Following') }}">
    <x-header title="{{ __('Following') }}" subtitle="{{ __('Have a look at posts from accounts you follow') }}" />
    <div class="content__holder">
        <x-posts-holder>
            @foreach ($posts as $post)
                <x-hover-image :post=$post />
            @endforeach
        </x-posts-holder>
    </div>
</x-app-layout>
