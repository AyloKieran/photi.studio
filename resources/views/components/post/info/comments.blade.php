<div class="post__comments">
    <span class="section__title">{{ __('Comments') }}</span>
    @livewire('post.comments', ['post' => $post], key('comments-' . $post->id))
    @auth
        @livewire('post.comment-box', ['post' => $post], key('comment-box-' . $post->id))
    @endauth
</div>
