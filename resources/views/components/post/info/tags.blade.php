<div class="post__tags">
    <span class="section__title">{{ __('Tags') }}</span>
    <div class="post__tags-holder">
        @for ($i = 0; $i < 12; $i++)
            <a href="#" class="tag">
                #tag {{ $i }}
            </a>
        @endfor
    </div>
</div>
