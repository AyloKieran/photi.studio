<a class="hoverImage">
    @php
        $width = rand(200, 900);
        $height = rand(200, 900);
        $image = "https://picsum.photos/$width/$height";
    @endphp
    <img class="hoverImage__image" src="{{ $image }}" width="{{ $width }}px" height="{{ $height }}px"
        loading="lazy" decoding="async" />
    <div class="hoverImage__image--overlay">
        <div class="hoverImage__image--controls">
            <div class="control control__actionable control__actionable--active">
                <i class="icon fa fa-thumbs-up"></i>
            </div>
            <div class="control control__actionable">
                <i class="icon fa fa-thumbs-down"></i>
            </div>
        </div>
    </div>
</a>
