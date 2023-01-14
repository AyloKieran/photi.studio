@if ($post->tags->count() > 0)
    <div class="post__tags">
        <span class="section__title">{{ __('Tags') }}</span>
        <div class="post__tags-holder">
            @foreach ($post->tags as $tag)
                <a href="{{ route('search.tag', ['tag' => $tag]) }}" class="tag">
                    {{ $tag->formatted_name }}
                </a>
            @endforeach
        </div>
    </div>
@endif
