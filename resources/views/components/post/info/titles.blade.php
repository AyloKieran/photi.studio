<div class="section post__title">
    <input id="post__description--expanded" type="checkbox" checked>

    @if ($post->title != null)
        <span class="section__title">{{ $post->title }}</span>
    @endif
    @if ($post->description != null)
        <p class="section__subtitle">{{ $post->description }}</p>
        {{-- <label for="post__description--expanded" class="post__description-toggle"></label> --}}
    @endif

</div>
