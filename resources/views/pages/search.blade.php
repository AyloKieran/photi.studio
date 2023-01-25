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
        @php
            $showMore = $search != '';
            $postsRoute = route('search.posts', [$search]);
            $tagsRoute = route('search.tags', [$search]);
            $usersRoute = route('search.users', [$search]);
        @endphp
        <x-section title="{{ __('Posts') }}" href="{{ $showMore ? $postsRoute : '' }}">
            @if (count($posts) > 0)
                <x-search.line :content=$posts>
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
        <x-section title="{{ __('Tags') }}" href="{{ $showMore ? $tagsRoute : '' }}">
            @if (count($tags) > 0)
                <x-search.line>
                    @foreach ($tags as $tag)
                        <x-search.cards.tag :tag=$tag />
                    @endforeach
                </x-search.line>
            @else
                <x-search.message>
                    {{ __('There are no tags found for the search \':criteria\'.', ['criteria' => $search]) }}
                </x-search.message>
            @endif
        </x-section>
        <x-section title="{{ __('Users') }}" href="{{ $showMore ? $usersRoute : '' }}">
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
