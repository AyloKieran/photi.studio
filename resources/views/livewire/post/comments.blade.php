<div class="post__comments-holder" wire:poll.10s>
    @forelse ($comments as $comment)
        <x-post.comment :comment=$comment />
    @empty
        There are no comments yet.
    @endforelse
</div>
