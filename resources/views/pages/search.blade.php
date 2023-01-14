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
                @foreach (\App\Models\Post::inRandomOrder()->take(7)->get(); as $post)
                    <x-search.cards.post :post=$post />
                @endforeach
            </x-search.line>
        </x-section>
        <x-section title="{{ __('Tags') }}" href="{{ route('search', [$search]) }}">
            <x-search.line>
                @foreach (\App\Models\Tag::withCount('posts')->orderBy('posts_count', 'desc')->take(7)->get(); as $tag)
                    <x-search.cards.tag :tag=$tag />
                @endforeach
            </x-search.line>
        </x-section>
        <x-section title="{{ __('Users') }}" href="{{ route('search', [$search]) }}">
            <x-search.line>
                @foreach (\App\Models\User::inRandomOrder()->take(7)->get() as $user)
                    <x-search.cards.user :user=$user />
                @endforeach
            </x-search.line>
        </x-section>
    </div>
</x-app-layout>
