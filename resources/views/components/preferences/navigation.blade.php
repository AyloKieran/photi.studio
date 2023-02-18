<div class="nav">
    <x-navigation.section title="{{ __('Account') }}">
        <x-navigation.link title="{{ __('Profile') }}" icon="fa-user" route="preferences.profile" />
        <x-navigation.link title="{{ __('Theme') }}" icon="fa-brush" route="preferences.theme" />
        <x-navigation.link title="{{ __('Content') }}" icon="fa-pager" route="preferences.content" />
        {{-- <x-navigation.link title="{{ __('Change Password') }}" icon="fa-key" /> --}}
        <x-navigation.link title="{{ __('Deactivate Profile') }}" icon="fa-trash"
            route="preferences.deactivate-profile" />
    </x-navigation.section>
    {{-- <x-navigation.section title="{{ __('Social') }}">
        <x-navigation.link title="{{ __('Linked Accounts') }}" icon="fa-bolt" />
    </x-navigation.section> --}}
    <x-navigation.section title="{{ __('My Data') }}">
        <x-navigation.link title="{{ __('My Posts') }}" icon="fa-camera" route="preferences.posts" />
        <x-navigation.link title="{{ __('My Likes') }}" icon="fa-thumbs-up" route="preferences.likes" />
        <x-navigation.link title="{{ __('My Tag Ratings') }}" icon="fa-tags" route="preferences.tags" />
        {{-- <x-navigation.link title="{{ __('My Comments') }}" icon="fa-book" /> --}}
    </x-navigation.section>
</div>
