<x-app-layout title="{{ __('#:tag Tagged Posts', ['tag' => $tag]) }}">
    <x-header title="{{ __('\'#:tag\' Tagged Posts', ['tag' => $tag]) }}">
    </x-header>
    <div class="content__holder">
        <x-posts-holder>
            @for ($i = 0; $i < 50; $i++)
                <x-hover-image />
            @endfor
        </x-posts-holder>
    </div>
</x-app-layout>
