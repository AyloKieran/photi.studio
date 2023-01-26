<div class="notification__holder" @if (count($posts) > 0) wire:poll.1500ms @endif>
    <div class="notification__inner">
        @foreach ($posts as $post)
            @php
                $complete = $post->status == \App\Enums\PostStatusEnum::COMPLETE->value;
                $tagType = $complete ? 'a' : 'div';
                $showImage = $post->status == \App\Enums\PostStatusEnum::ANALYSING->value || $post->status == \App\Enums\PostStatusEnum::FINALISING->value || $post->status == \App\Enums\PostStatusEnum::COMPLETE->value;
                $icon = $complete ? 'fa-check' : ($post->status != \App\Enums\PostStatusEnum::FAILED->value ? 'fa-spinner fa-spin' : 'fa-triangle-exclamation');
            @endphp

            <{{ $tagType }} @if ($complete) href={{ route('post', ['post' => $post]) }} @endif
                class="notification__item notification--post">
                <div class="notification__content">
                    <div class="notification__image">
                        @if ($showImage)
                            <img src="{{ $post->image_thumbnail }}" alt="{{ $post->caption }}" width="{{ $post->width }}"
                                height="{{ $post->height }}" loading="lazy" decoding="async" />
                        @else
                            @if ($post->status == \App\Enums\PostStatusEnum::FAILED->value)
                                <i class="icon fa-solid fa-image"></i>
                            @endif
                            @if (
                                $post->status == \App\Enums\PostStatusEnum::PENDING->value ||
                                    $post->status == \App\Enums\PostStatusEnum::CONVERTING_UPLOADING->value)
                                <i class="icon fa-solid fa-cloud-arrow-up"></i>
                            @endif
                        @endif
                    </div>
                    <div class="notification__info">
                        <div class="title">{{ $post->title }}</div>
                        <div class="subtitle">{{ __(' is \':status\' ', ['status' => $post->status]) }}</div>
                    </div>
                    <div class="notification__icon">
                        <i class="icon fa-solid {{ $icon }}"></i>
                    </div>
                </div>
                </{{ $tagType }}>
        @endforeach
    </div>
</div>
