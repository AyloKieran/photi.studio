<a href="{{ route('search.tag', ['tag' => $tag]) }}" class="search__card" style="--imageUrl: url({{ $tag->getImage() }})">
    <span class="search__card-title">{{ $tag->formatted_name }}</span>
    <span class="search__card-subtitle">{{ $tag->posts()->count() }} posts</span>
</a>
