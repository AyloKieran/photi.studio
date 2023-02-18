<x-app-layout title="{{ __('Friends') }}">
    <x-header title="{{ __('Friends') }}" subtitle="{{ __('Have a look at what your friends have been up to') }}" />
    <div class="content__holder">
        <x-posts-holder>
            @foreach ($posts as $post)
                <x-hover-image :post=$post />
            @endforeach
        </x-posts-holder>
    </div>
</x-app-layout>
