<x-section>
    <div class="post">
        <div class="post__holder">
            <div class="post__image">
                @php
                    $width = rand(700, 1900);
                    $height = rand(700, 1900);
                    $image = "https://picsum.photos/$width/$height";
                @endphp
                <img src="{{ $image }}" width="{{ $width }}px" height="{{ $height }}px" loading="lazy"
                    decoding="async">
                <div class="post__image--overlay">
                    <div class="post__image--controls">
                        <div class="control control__actionable">
                            <img src="https://kierannoble.dev/assets/me.webp" loading="lazy" decoding="async">
                        </div>
                        <div class="control control__actionable control__actionable--active">
                            <i class="icon fa fa-thumbs-up"></i>
                        </div>
                        <div class="control control__actionable">
                            <i class="icon fa fa-thumbs-down"></i>
                        </div>
                        <div class="control control__actionable">
                            <i class="icon fa fa-magnifying-glass-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post__info">
                <div class="section">
                    <span class="section__title">Here is a long post title that will span across
                        multiple lines</span>
                    <span class="section__subtitle">Here is some more text that further goes to
                        explain what the post is about, again being able to span multiple lines, so
                        much so that it might actually be so long that I want to put a limit on it
                        to stop it overflowing too much and causing the layout to shift vertically.
                        More text here...</span>
                </div>
                <hr class="seperator" />
                <div class="">tags</div>
                <div class="">tags</div>
                <hr class="seperator" />
                <div class="">comments</div>
                <div class="">comments</div>
            </div>
        </div>
    </div>
</x-section>
