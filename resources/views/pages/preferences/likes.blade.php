<x-preferences-layout title="{{ __('My Likes') }}">
    <x-header title="{{ __('My Likes') }}" />
    <main class="content">
        <div class="content__holder">
            <x-section title="{{ __('My Likes') }}" subtitle="{{ __('All posts you\'ve interacted with') }}">
                <div class="control control__table">
                    <table>
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Rating') }}</th>
                                <th>{{ __('Last Updated') }}</th>
                            </tr>
                        </thead>
                        @forelse ($ratings as $rating)
                            <tr>
                                <td>
                                    <a href="{{ route('post', ['post' => $rating->post]) }}">
                                        {{ $rating->post->title }}
                                    </a>
                                </td>
                                <td>{{ $rating->rating }}</td>
                                <td>{{ $rating->updated_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    {{ __('You haven\'t liked anything yet.') }}
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
