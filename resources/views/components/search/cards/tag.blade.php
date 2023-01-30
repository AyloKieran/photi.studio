<a href="{{ route('search.tag', ['tag' => $tag]) }}" class="search__card" style="--imageUrl: url({{ $tag->image }})">
    <span class="search__card-title">{{ $tag->formatted_name }}</span>
    <span class="search__card-subtitle">{{ $tag->posts_count }} posts</span>
</a>
