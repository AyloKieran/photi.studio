<x-app-layout title="{{ __(':postTitle - :postAuthor', ['postTitle' => $post->title, 'postAuthor' => $post->author->preferred_name]) }}">
    <div class="content__holder">
        <x-post :post=$post />
        <x-posts-holder>
            @foreach (\App\Models\Post::inRandomOrder()->take(50)->get(); as $post)
                <x-hover-image :post=$post />
            @endforeach
        </x-posts-holder>
    </div>
</x-app-layout>
