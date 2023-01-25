<x-preferences-layout title="{{ __('Deactivate Profile') }}">
    <x-header title="{{ __('Deactivate Profile') }}" subtitle="{{ __('Leave Photi.Studio and remove all data') }}" />
    <main class="content">
        <form method="POST" action="{{ route('preferences.deactivate-profile.update') }}">
            @csrf
            <div class="content__holder">
                <x-section title="{{ __('Deactivate Profile') }}"
                    subtitle="{{ __('Press below to deactivate your profile') }}">
                    <x-button type="submit">{{ __('Deactivate Profile') }}</x-button>
                </x-section>
            </div>
        </form>
    </main>
</x-preferences-layout>
