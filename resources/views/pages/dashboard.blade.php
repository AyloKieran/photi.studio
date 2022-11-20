<x-app-layout title="{{ __('Dashboard') }}">
    <x-header title="{{ __('Home') }}" />
    <div class="content__holder">
        <x-posts-holder>
            @for ($i = 0; $i < 500; $i++)
                <x-hover-image />
            @endfor
        </x-posts-holder>
    </div>
</x-app-layout>
