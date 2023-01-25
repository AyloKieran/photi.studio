<x-app-layout title="{{ __('Search Posts') }}">
    <x-header title="{{ __('Search Posts') }}" />
    <div class="content__holder">
        <x-section>
            <form class="search__controls" action="{{ route('search.posts.lookup') }}" method="POST">
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
            @if (count($posts) > 0)
                <x-search.line>
                    @foreach ($posts as $post)
                        <x-search.cards.post :post=$post />
                    @endforeach
                </x-search.line>
            @else
                <x-search.message>
                    {{ __('There are no posts found for the search \':criteria\'.', ['criteria' => $search]) }}
                </x-search.message>
            @endif
        </x-section>
    </div>
</x-app-layout>
