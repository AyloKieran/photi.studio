<nav class="navigation">
    <input id="navigation__shown" type="checkbox">
    <div class="navigation__header">
        <div>logo</div>
        <label class="navigation__toggle" for="navigation__shown">
            <i class="fa fa-bars"></i>
        </label>
    </div>
    <aside class="navigation__bar">
        @include('components.global.navigation')
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
