<nav class="navigation">
    <input id="navigation__shown" type="checkbox">
    <div class="navigation__header">
        <x-logo navFriendly="true" />
        <label class="navigation__toggle" for="navigation__shown">
            <i class="fa fa-bars"></i>
        </label>
    </div>
    <aside class="navigation__bar">
        <div class="nav">
            @include('components.global.navigation')
        </div>
        <div class="navigation__auth">
            @auth
                <a href="#" class="navigation__user">
                    <img src="{{ auth()->user()->avatar }}" loading="lazy" decoding="async">
                    <span>{{ auth()->user()->preferred_name }}</span>
                </a>
                <div class="navigation__actions">
                    <a class="icon fa-solid fa-cog" href={{ route('preferences') }}></a>
                    <i class="icon fa-solid fa-arrow-right-from-bracket"
                        onclick="document.getElementById('logoutForm').submit()"></i>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" style="display: none" id="logoutForm">
                @csrf
            </form>
        @else
            <div class="navigation__auth--actions">
                <a href="{{ route('login') }}">
                    <x-button primary>
                        {{ __('Login') }}
                        <i class="icon fa-solid fa-arrow-right-to-bracket"></i>
                    </x-button>
                </a>
                <a href="{{ route('register') }}">
                    <x-button>
                        {{ __('Register') }}
                        <i class="icon fa-solid fa-user-plus"></i>
                    </x-button>
                </a>
            </div>
        @endauth
    </aside>
    <label class="navigation__shade" for="navigation__shown"></label>
</nav>
