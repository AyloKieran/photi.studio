<x-preferences-layout title="{{ __('Communications') }}">
    <x-header title="{{ __('Communications') }}"
        subtitle="{{ __('How do you want Photi.Studio to communicate with you?') }}" />
    <main class="content">
        <form method="POST" action="{{ route('preferences.communications.update') }}">
            @csrf
            <div class="content__holder">
                <x-section title="{{ __('Get Notifications for Posts') }}"
                    subtitle="{{ __('Should you receive an email for Posts?') }}">
                    <x-toggle :name="$postKey" :value="$post" required />
                </x-section>
                <x-section title="{{ __('Get Notifications for Likes') }}"
                    subtitle="{{ __('Should you receive an email for Likes?') }}">
                    <x-toggle :name="$likeKey" :value="$like" required />
                </x-section>
                <x-section title="{{ __('Get Notifications for Follows') }}"
                    subtitle="{{ __('Should you receive an email for Follows?') }}">
                    <x-toggle :name="$followKey" :value="$follow" required />
                </x-section>
                <div class="content__footer">
                    <x-button secondary
                        href="{{ route('preferences.communications') }}">{{ __('Cancel') }}</x-button>
                    <x-button primary type="submit">{{ __('Save') }}</x-button>
                </div>
            </div>
        </form>
    </main>
</x-preferences-layout>
