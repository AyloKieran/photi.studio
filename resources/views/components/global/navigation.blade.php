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
    <x-navigation.link title="{{ __('Prototype Feedback') }}" icon="fa-swatchbook" />
</x-navigation.section>