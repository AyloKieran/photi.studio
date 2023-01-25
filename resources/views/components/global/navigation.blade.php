@auth
    <x-navigation.section>
        <x-navigation.link title="{{ __('Upload Photo') }}" actionable="true" route="upload" />
    </x-navigation.section>
@endauth
<x-navigation.section title="{{ __('Posts') }}">
    @auth
        <x-navigation.link title="{{ __('My Feed') }}" icon="fa-home" route="home" />
    @endauth
    <x-navigation.link title="{{ __('Trending') }}" icon="fa-arrow-trend-up" route="trending" />
    <x-navigation.link title="{{ __('Search') }}" icon="fa-search" route="search" />
</x-navigation.section>
@auth
    {{-- <x-navigation.section title="{{ __('Social') }}">
        <x-navigation.link title="{{ __('Notifications') }}" icon="fa-bell" />
        <x-navigation.link title="{{ __('Messages') }}" icon="fa-envelope" />
    </x-navigation.section> --}}
@endauth
{{-- <x-navigation.section title="{{ __('Prototype') }}">
    <x-navigation.link title="{{ __('Prototype Feedback') }}" icon="fa-swatchbook" />
</x-navigation.section> --}}
