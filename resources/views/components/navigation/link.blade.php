@props(['title', 'route' => null, 'icon' => null, 'actionable' => false])

<a class="nav__link @if ($route != null && Request::routeIs($route . '*')) nav__link--active @endif @if ($actionable) nav__link--actionable @endif"
    @if ($route != null) href="{{ route($route) }}" @endif>
    @if ($icon)
        <i class="nav__link-icon icon fa-solid {{ $icon }}"></i>
    @endif
    <div class="nav__link-title">{{ $title }}</div>
</a>
