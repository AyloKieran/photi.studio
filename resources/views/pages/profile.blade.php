<x-app-layout title="{{ __(':name', ['name' => $user->preferred_name]) }}">
    <div class="content__holder">
        <x-profile :user=$user />
        <x-posts-holder>
            @foreach (\App\Models\Post::where('user_id', $user->id)->get(); as $post)
                <x-hover-image :post=$post />
            @endforeach
        </x-posts-holder>
    </div>
</x-app-layout>
