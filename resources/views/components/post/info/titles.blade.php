<div class="section post__title">
    <input id="post__description--expanded" type="checkbox">

    @if ($post->title != null)
        <span class="section__title">{{ $post->title }}</span>
    @endif
    @if ($post->description != null)
        <p class="section__subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <label for="post__description--expanded" class="post__description-toggle">
        </label>
    @endif

</div>
