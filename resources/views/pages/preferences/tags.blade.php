<x-preferences-layout title="{{ __('Tag Ratings') }}">
    <x-header title="{{ __('Tag Ratings') }}" />
    <main class="content">
        <div class="content__holder">
            <x-section title="{{ __('Tags') }}" subtitle="{{ __('Every tag you\'ve interacted with') }}">
                <div class="control control__table">
                    <table>
                        <thead>
                            <tr>
                                <th>{{ __('Tag') }}</th>
                                <th>{{ __('Rating') }}</th>
                            </tr>
                        </thead>
                        @forelse ($tagsData as $tagData)
                            <tr>
                                <td>
                                    <a href="{{ route('search.tag', ['tag' => $tagData->tag]) }}">
                                        {{ $tagData->tag->name }}
                                    </a>
                                </td>
                                <td>{{ $tagData->rating }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    {{ __('You haven\'t rated any tags yet.') }}
                                </td>
                            </tr>
                        @endforelse
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    {{ __(':count Tags', ['count' => $tagsData->count()]) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-section>
        </div>
    </main>
</x-preferences-layout>
