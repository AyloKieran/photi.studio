<x-preferences-layout title="{{ __('My Likes') }}">
    <x-header title="{{ __('My Likes') }}" />
    <main class="content">
        <div class="content__holder">
            <x-section title="{{ __('My Likes') }}" subtitle="{{ __('All posts you\'ve interacted with') }}">
                <div class="control control__table control__table--navigatable">
                    <table>
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Rating') }}</th>
                                <th>{{ __('Updated') }}</th>
                            </tr>
                        </thead>
                        @forelse ($ratings as $rating)
                            <tr>
                                <td>
                                    <a href="{{ route('post', ['post' => $rating->post]) }}">
                                        {{ $rating->post->title }}
                                    </a>
                                </td>
                                <td>
                                    @if ($rating->rating == \App\Enums\PostRatingEnum::LIKE->value)
                                        <i class="icon fa-solid fa-thumbs-up"></i>
                                    @endif
                                    @if ($rating->rating == \App\Enums\PostRatingEnum::DISLIKE->value)
                                        <i class="icon fa-solid fa-thumbs-down"></i>
                                    @endif
                                </td>
                                <td>{{ $rating->updated_at->diffForHumans(null, false, true) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="control__table--empty">
                                    {{ __('You haven\'t rated any posts yet.') }}
                                </td>
                            </tr>
                        @endforelse
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    {{ __(':count Posts', ['count' => $ratings->count()]) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-section>
        </div>
    </main>
</x-preferences-layout>
