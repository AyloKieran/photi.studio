<nav class="navigation">
    <input id="navigation__shown" type="checkbox">
    <div class="navigation__header">
        <div>logo</div>
        <label class="navigation__toggle" for="navigation__shown">
            <i class="fa fa-bars"></i>
        </label>
    </div>
    <aside class="navigation__bar">
        <div class="nav">
            <x-navigation.section>
                <x-navigation.link title="{{ __('Upload Photo') }}" actionable="true" />
            </x-navigation.section>
            <x-navigation.section title="{{ __('Posts') }}">
                <x-navigation.link title="{{ __('My Feed') }}" icon="fa-home" route="dashboard" />
                <x-navigation.link title="{{ __('Search') }}" icon="fa-search" />
                <x-navigation.link title="{{ __('Trending') }}" icon="fa-arrow-trend-up" />
                <x-navigation.link title="{{ __('Friends') }}" icon="fa-users" />
            </x-navigation.section>
            <x-navigation.section title="{{ __('Social') }}">
                <x-navigation.link title="{{ __('Notifications') }}" icon="fa-bell" />
                <x-navigation.link title="{{ __('Messages') }}" icon="fa-envelope" />
            </x-navigation.section>
            <x-navigation.section title="{{ __('Prototype') }}">
                <x-navigation.link title="{{ __('Prototype Feedback') }}" icon="fa-comments" />
            </x-navigation.section>
        </div>
        <div class="navigation__auth">
            <a href="#" class="navigation__user">
                <img src="https://kierannoble.dev/assets/me.webp">
                <span>{{ auth()->user()->name }}</span>
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

    </aside>
    <label class="navigation__shade" for="navigation__shown"></label>
</nav>
