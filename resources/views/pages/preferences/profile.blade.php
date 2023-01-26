<x-preferences-layout title="{{ __('Profile') }}">
    <x-header title="{{ __('Profile') }}" subtitle="{{ __('How do you want to be seen on Photi.Studio?') }}" />
    <main class="content">
        <form method="POST" action="{{ route('preferences.profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="content__holder">
                <x-section title="{{ __('Full Name') }}">
                    <x-input type="text" name="name" value="{{ $user->name }}" required />
                </x-section>
                <x-section title="{{ __('Username') }}">
                    <x-input type="text" name="username" value="{{ $user->username }}" required />
                </x-section>
                <x-section title="{{ __('Profile Picture') }}" subtitle="{{ __('Ideally a square image') }}">
                    <div class="avatar">
                        <img src="{{ $user->avatar }}" alt="{{ $user->preferred_name }}" loading="lazy"
                            decoding="async" />
                    </div>
                    <x-input-file name="profile-picture" />
                </x-section>
                <x-section title="{{ __('Bio') }}" subtitle="{{ __('Tell others a little bit about yourself') }}">
                    <x-textarea name="bio" value="{{ $user->bio }}" rows=4 />
                </x-section>
                <div class="content__footer">
                    <x-button secondary href="{{ route('preferences.profile') }}">{{ __('Cancel') }}</x-button>
                    <x-button primary type="submit">{{ __('Save') }}</x-button>
                </div>
            </div>
        </form>
    </main>
</x-preferences-layout>
