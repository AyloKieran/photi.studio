<a href="{{ route('post', ['post' => $post]) }}" class="search__card"
    style="--imageUrl: url({{ $post->image_thumbnail }})">
    <span class="search__card-title">{{ $post->title }}</span>
    <span class="search__card-subtitle">{{ $post->author->preferred_name }}</span>
</a>
