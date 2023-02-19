<x-preferences-layout title="{{ __('My Posts') }}">
    <x-header title="{{ __('My Posts') }}" />
    <main class="content">
        <div class="content__holder">
            <x-section title="{{ __('My Posts') }}" subtitle="{{ __('All of your posts') }}">
                <div class="control control__table">
                    <table>
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Rating') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Created') }}</th>
                            </tr>
                        </thead>
                        @forelse ($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{ $post->status == 'complete' ? route('post', ['post' => $post]) : '' }}">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>{{ $post->rating }}</td>
                                <td>{{ $post->status }}</td>
                                <td>{{ $post->created_at->diffForHumans(null, false, true) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    {{ __('You haven\'t posted anything yet.') }}
                                </td>
                            </tr>
                        @endforelse
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    {{ __(':count Posts', ['count' => $posts->count()]) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-section>
        </div>
    </main>
</x-preferences-layout>
