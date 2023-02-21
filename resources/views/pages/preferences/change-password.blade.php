<x-preferences-layout title="{{ __('Profile') }}">
    <x-header title="{{ __('Profile') }}" subtitle="{{ __('How do you want to be seen on Photi.Studio?') }}" />
    <main class="content">
        <form method="POST" action="{{ route('preferences.change-password.update') }}">
            @csrf
            <div class="content__holder">
                @if (session()->has('success'))
                    <x-search.message>
                        {{ __('Successfully updated password.') }}
                    </x-search.message>
                @endif
                <x-section title="{{ __('Current Password') }}">
                    <x-input type="password" name="current_password" required />
                </x-section>
                <x-section title="{{ __('New Password') }}">
                    <x-input type="password" name="password" required />
                </x-section>
                <x-section title="{{ __('Confirm New Password') }}">
                    <x-input type="password" name="password_confirmation" required />
                </x-section>
                <div class="content__footer">
                    <x-button secondary href="{{ route('preferences.change-password') }}">{{ __('Cancel') }}</x-button>
                    <x-button primary type="submit">{{ __('Save') }}</x-button>
                </div>
            </div>
        </form>
    </main>
</x-preferences-layout>
