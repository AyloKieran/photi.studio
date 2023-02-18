<x-app-layout title="{{ __('Home') }}">
    <x-header title="{{ __('Home') }}" />
    <div class="content__holder">
        @livewire('post-upload-progress')
        <x-posts-holder>
            @foreach ($posts as $post)
                <x-hover-image :post=$post />
            @endforeach
        </x-posts-holder>
    </div>
</x-app-layout>
