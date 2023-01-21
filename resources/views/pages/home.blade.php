<x-app-layout title="{{ __('Home') }}">
    <x-header title="{{ __('Home') }}">
        <x-button>
            <i class="icon fa-solid fa-filter"></i>
            {{ __('Filter') }}
        </x-button>
    </x-header>
    <div class="content__holder">
        <x-posts-holder>
            @foreach (\App\Models\Post::all() as $post)
                <x-hover-image :post=$post />
            @endforeach
        </x-posts-holder>
    </div>
</x-app-layout>
