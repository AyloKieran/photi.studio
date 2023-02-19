<div class="post__comments-actions">
    <div class="post__comments-input">
        <input type="text" name="unused" placeholder="Add a comment..." wire:model="comment">
        @if ($length > 0)
            <span
                class="post__comments-input--feedback {{ !$canSubmit ? 'post__comments-input--feedback--error' : '' }}">{{ $length }}/{{ $maxLength }}</span>
        @endif
    </div>
    <button class="post__comments-button" @if (!$canSubmit) disabled @endif wire:click="save">
        <i class="icon fa-solid fa-arrow-right"></i>
    </button>
</div>
