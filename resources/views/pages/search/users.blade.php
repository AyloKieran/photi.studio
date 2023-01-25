<x-app-layout title="{{ __('Search Users') }}">
    <x-header title="{{ __('Search Users') }}" />
    <div class="content__holder">
        <x-section>
            <form class="search__controls" action="{{ route('search.users.lookup') }}" method="POST">
                @csrf
                <x-input type="search" name="search" placeholder="{{ __('What would you like to find?') }}"
                    value="{{ $search }}" autofocus=true />
                <x-button primary type="submit">
                    {{ __('Search') }}
                    <i class="icon fa-solid fa-search"></i>
                </x-button>
            </form>
        </x-section>
        <x-section>
            @if (count($users) > 0)
                <x-search.line>
                    @foreach ($users as $user)
                        <x-search.cards.user :user=$user />
                    @endforeach
                </x-search.line>
            @else
                <x-search.message>
                    {{ __('There are no users found for the search \':criteria\'.', ['criteria' => $search]) }}
                </x-search.message>
            @endif
        </x-section>
    </div>
</x-app-layout>
