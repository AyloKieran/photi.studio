<x-app-layout title="{{ __('Search') }}">
    <x-header title="{{ __('Search') }}" />
    <div class="content__holder">
        <x-section>
            <form class="search__controls" action="{{ route('search.lookup') }}" method="POST">
                @csrf
                <x-input type="search" name="search" placeholder="{{ __('What would you like to find?') }}"
                    value="{{ $search }}" autofocus=true />
                <x-button primary type="submit">
                    {{ __('Search') }}
                    <i class="icon fa-solid fa-search"></i>
                </x-button>
            </form>
        </x-section>
        @if ($search != '')
            <x-section title="{{ __('Test Message') }}" href="{{ route('search', [$search]) }}">
                <x-search.message>
                    {{ __('There are no :type found for the search \':criteria\'.', ['type' => 'posts/tags/users', 'criteria' => $search]) }}
                </x-search.message>
            </x-section>
        @endif
        <x-section title="{{ __('Posts') }}" href="{{ route('search', [$search]) }}">
            <x-search.line>
                @for ($i = 0; $i < 7; $i++)
                    <x-search.cards.post />
                @endfor
            </x-search.line>
        </x-section>
        <x-section title="{{ __('Tags') }}" href="{{ route('search', [$search]) }}">
            <x-search.line>
                @for ($i = 0; $i < 7; $i++)
                    <x-search.cards.tag />
                @endfor
            </x-search.line>
        </x-section>
        <x-section title="{{ __('Users') }}" href="{{ route('search', [$search]) }}">
            <x-search.line>
                @for ($i = 0; $i < 7; $i++)
                    <x-search.cards.user />
                @endfor
            </x-search.line>
        </x-section>
    </div>
</x-app-layout>
