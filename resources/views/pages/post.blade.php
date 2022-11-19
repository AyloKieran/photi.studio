<x-app-layout title="{{ __('TEMP POST') }}">
    <div class="content__holder">
        <x-post />
        <x-posts-holder>
            @for ($i = 0; $i < 50; $i++)
                <x-hover-image />
            @endfor
        </x-posts-holder>
    </div>
</x-app-layout>
