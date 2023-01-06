<x-app-layout title="{{ __(':name', ['name' => $user->preferred_name]) }}">
    <div class="content__holder">
        <x-profile :user=$user />
        <x-posts-holder>
            @for ($i = 0; $i < 50; $i++)
                <x-hover-image />
            @endfor
        </x-posts-holder>
    </div>
</x-app-layout>
