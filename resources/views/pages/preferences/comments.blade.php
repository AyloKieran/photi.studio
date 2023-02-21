<x-preferences-layout title="{{ __('My Comments') }}">
    <x-header title="{{ __('My Comments') }}" />
    <main class="content">
        <div class="content__holder">
            <x-section title="{{ __('My Likes') }}" subtitle="{{ __('All comments you\'ve posted') }}">
                <div class="control control__table control__table--navigatable">
                    <table>
                        <thead>
                            <tr>
                                <th>{{ __('Comment') }}</th>
                                <th>{{ __('Post') }}</th>
                                <th>{{ __('Created') }}</th>
                            </tr>
                        </thead>
                        @forelse ($comments as $comment)
                            <tr>
                                <td>
                                    <a href="{{ route('post', ['post' => $comment->post]) }}">
                                        {{ $comment->commentText }}
                                    </a>
                                </td>
                                <td><a href="{{ route('post', ['post' => $comment->post]) }}">
                                        {{ $comment->post->title }}
                                    </a></td>
                                <td>{{ $comment->created_at->diffForHumans(null, false, true) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="control__table--empty">
                                    {{ __('You haven\'t posted any comments yet.') }}
                                </td>
                            </tr>
                        @endforelse
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    {{ __(':count Comments', ['count' => $comments->count()]) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-section>
        </div>
    </main>
</x-preferences-layout>
