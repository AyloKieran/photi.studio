<div class="nav">
    <x-navigation.section>
        <x-navigation.link title="{{ _('Upload Photo') }}" actionable="true" />
    </x-navigation.section>
    <x-navigation.section title="{{ _('Posts') }}">
        <x-navigation.link title="{{ _('My Feed') }}" icon="fa-home" route="dashboard" />
        <x-navigation.link title="{{ _('Search') }}" icon="fa-search" />
        <x-navigation.link title="{{ _('Trending') }}" icon="fa-arrow-trend-up" />
        <x-navigation.link title="{{ _('Friends') }}" icon="fa-users" />
    </x-navigation.section>
    <x-navigation.section title="{{ _('Social') }}">
        <x-navigation.link title="{{ _('Notifications') }}" icon="fa-bell" />
        <x-navigation.link title="{{ _('Messages') }}" icon="fa-envelope" />
    </x-navigation.section>
    <x-navigation.section title="{{ _('Prototype') }}">
        <x-navigation.link title="{{ _('Prototype Feedback') }}" icon="fa-comments" />
    </x-navigation.section>
</div>
