<x-app-layout title="{{ __('Trending') }}">
    <x-header title="{{ __('Trending') }}"
        subtitle="{{ __('Have a look at some of the most popular posts from the last week') }}" />
    <div class="content__holder">
        <x-posts-holder>
            @foreach ($posts as $post)
                <x-hover-image :post=$post />
            @endforeach
        </x-posts-holder>
    </div>
</x-app-layout>
