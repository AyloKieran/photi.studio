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
            <div class="nav__section">
                <div class="nav__link nav__link--actionable">
                    <div class="nav__link-title">Upload Photo</div>
                </div>
            </div>
            <div class="nav__section">
                <span class="nav__section-title">Posts</span>
                <div class="nav__link nav__link--active">
                    <i class="nav__link-icon icon fa-solid fa-home"></i>
                    <div class="nav__link-title">My Feed</div>
                </div>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-search"></i>
                    <div class="nav__link-title">Search</div>
                </div>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-arrow-trend-up"></i>
                    <div class="nav__link-title">Trending</div>
                </div>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-users"></i>
                    <div class="nav__link-title">Friends</div>
                </div>
            </div>
            <div class="nav__section">
                <span class="nav__section-title">Social</span>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-bell"></i>
                    <div class="nav__link-title">Notifications</div>
                </div>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-envelope"></i>
                    <div class="nav__link-title">Messages</div>
                </div>
            </div>
            <div class="nav__section">
                <span class="nav__section-title">Prototype</span>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-comments"></i>
                    <div class="nav__link-title">Prototype Feedback</div>
                </div>
            </div>
        </div>
        <div class="navigation__auth">
            <a href="#" class="navigation__user">
                <img src="https://kierannoble.dev/assets/me.webp">
                <span>{{ auth()->user()->name }}</span>
            </a>
            <div class="navigation__actions">
                <i class="icon fa-solid fa-cog"></i>
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
