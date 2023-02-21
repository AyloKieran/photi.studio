<div class="post__comments-holder" wire:poll.10s>
    @forelse ($comments as $comment)
        <x-post.comment :comment=$comment />
    @empty
        <span class="post__comments-holder--feedback">
            {{ __('No comments yet. Be the first to comment!') }}
        </span>
    @endforelse
</div>
