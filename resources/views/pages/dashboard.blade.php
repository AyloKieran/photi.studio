<x-app-layout title="{{ __('Dashboard') }}">
    <x-header title="{{ __('Home') }}">
        <x-button>
            <i class="icon fa-solid fa-filter"></i>
            {{ __('Filter') }}
        </x-button>
    </x-header>
    <div class="content__holder">
        <x-posts-holder>
            @for ($i = 0; $i < 50; $i++)
                <x-hover-image />
            @endfor
        </x-posts-holder>
    </div>
</x-app-layout>
