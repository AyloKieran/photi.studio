<div class="post__comments">
    <span class="section__title">{{ __('Comments') }}</span>
    {{-- <div class="post__comments-holder"></div> --}}
    <div class="post__comments-holder">
        @for ($i = 0; $i < 60; $i++)
            <x-post.comment />
        @endfor
    </div>
    @auth
        <form action="" class="post__comments-actions">
            <div class="post__comments-input">
                <input type="text" name="unused" placeholder="Add a comment...">
                <span class="post__comments-input--feedback">14/300</span>
            </div>
            <button class="post__comments-button">
                <i class="icon fa-solid fa-arrow-right"></i>
            </button>
        </form>
    @endauth
</div>
