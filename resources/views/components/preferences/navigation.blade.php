<div class="nav">
    <x-navigation.section title="{{ _('Account') }}">
        <x-navigation.link title="{{ _('Profile Information') }}" icon="fa-user" route="preferences.profile-information" />
        <x-navigation.link title="{{ _('Theme') }}" icon="fa-brush" />
        <x-navigation.link title="{{ _('Change Password') }}" icon="fa-key" />
        <x-navigation.link title="{{ _('Deactivate Profile') }}" icon="fa-trash" />
    </x-navigation.section>
    <x-navigation.section title="{{ _('My Data') }}">
        <x-navigation.link title="{{ _('Posts') }}" icon="fa-camera" />
        <x-navigation.link title="{{ _('Comments') }}" icon="fa-book" />
        <x-navigation.link title="{{ _('Likes') }}" icon="fa-thumbs-up" />
    </x-navigation.section>
    <x-navigation.section title="{{ _('Social') }}">
        <x-navigation.link title="{{ _('Connected Accounts') }}" icon="fa-bolt" />
    </x-navigation.section>
</div>
