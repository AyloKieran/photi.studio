<div class="nav">
    <x-navigation.section title="{{ __('Account') }}">
        <x-navigation.link title="{{ __('Profile') }}" icon="fa-user" route="preferences.profile" />
        <x-navigation.link title="{{ __('Change Password') }}" icon="fa-key" route="preferences.change-password" />
        <x-navigation.link title="{{ __('Deactivate Profile') }}" icon="fa-trash"
            route="preferences.deactivate-profile" />
    </x-navigation.section>
    <x-navigation.section title="{{ __('Application') }}">
        <x-navigation.link title="{{ __('Theme') }}" icon="fa-brush" route="preferences.theme" />
        <x-navigation.link title="{{ __('Feeds') }}" icon="fa-pager" route="preferences.feeds" />
    </x-navigation.section>
    <x-navigation.section title="{{ __('Social') }}">
        <x-navigation.link title="{{ __('Linked Profiles') }}" icon="fa-circle-nodes"
            route="preferences.linked-profiles" />
    </x-navigation.section>
    <x-navigation.section title="{{ __('My Data') }}">
        <x-navigation.link title="{{ __('Posts') }}" icon="fa-camera" route="preferences.posts" />
        <x-navigation.link title="{{ __('Likes') }}" icon="fa-thumbs-up" route="preferences.likes" />
        <x-navigation.link title="{{ __('Tag Ratings') }}" icon="fa-tags" route="preferences.tags" />
        <x-navigation.link title="{{ __('Comments') }}" icon="fa-book" route="preferences.comments" />
    </x-navigation.section>
</div>
