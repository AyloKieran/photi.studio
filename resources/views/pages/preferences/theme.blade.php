@php
    $themes = [
        (object) [
            'key' => 'Dark',
            'value' => 'dark',
            'checked' => $theme === 'dark',
        ],
        (object) [
            'key' => 'Light',
            'value' => 'light',
            'checked' => $theme === 'light',
        ],
    ];

    $preferredNames = [
        (object) [
            'key' => 'Username',
            'value' => 'username',
            'checked' => $preferredName === 'username',
        ],
        (object) [
            'key' => 'Full Name',
            'value' => 'name',
            'checked' => $preferredName === 'name',
        ],
    ];
@endphp

<x-preferences-layout title="{{ __('Theme') }}">
    <x-header title="{{ __('Theme') }}" subtitle="{{ __('How do you want Photi.Studio to look and feel?') }}" />
    <main class="content">
        <form method="POST" action="{{ route('preferences.theme.update') }}">
            @csrf
            <div class="content__holder">
                <x-section title="{{ __('Theme Colour') }}"
                    subtitle="{{ __('Would you like Photi to be light or dark themed?') }}">
                    <x-radio :name="$themeKey" :values="$themes" />
                </x-section>
                <x-section title="{{ __('User\'s Display Names') }}"
                    subtitle="{{ __('How would you like user\'s names to be displayed?') }}">
                    <x-radio :name="$preferredNameKey" :values="$preferredNames" />
                </x-section>
                <div class="content__footer">
                    <x-button secondary href="{{ route('preferences.theme') }}">{{ __('Cancel') }}</x-button>
                    <x-button primary type="submit">{{ __('Save') }}</x-button>
                </div>
            </div>
        </form>
    </main>
</x-preferences-layout>
