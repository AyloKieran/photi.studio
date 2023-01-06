<div class="nav">
    <x-navigation.section title="{{ __('Account') }}">
        <x-navigation.link title="{{ __('Profile Information') }}" icon="fa-user"
            route="preferences.profile-information" />
        <x-navigation.link title="{{ __('Theme') }}" icon="fa-brush" route="preferences.theme" />
        <x-navigation.link title="{{ __('Change Password') }}" icon="fa-key" />
        <x-navigation.link title="{{ __('Deactivate Profile') }}" icon="fa-trash" />
    </x-navigation.section>
    <x-navigation.section title="{{ __('Social') }}">
        <x-navigation.link title="{{ __('Linked Accounts') }}" icon="fa-bolt" />
    </x-navigation.section>
    <x-navigation.section title="{{ __('My Data') }}">
        <x-navigation.link title="{{ __('Posts') }}" icon="fa-camera" />
        <x-navigation.link title="{{ __('Comments') }}" icon="fa-book" />
        <x-navigation.link title="{{ __('Likes') }}" icon="fa-thumbs-up" />
    </x-navigation.section>
</div>
