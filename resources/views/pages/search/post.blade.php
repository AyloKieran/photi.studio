<x-app-layout title="{{ __(' Similar Posts to :postName', ['postName' => $post]) }}">
    <x-header title="{{ __('Similar Posts to \':postName\'', ['postName' => $post]) }}">
    </x-header>
    <div class="content__holder">
        <x-posts-holder>
            @for ($i = 0; $i < 50; $i++)
                <x-hover-image />
            @endfor
        </x-posts-holder>
    </div>
</x-app-layout>
