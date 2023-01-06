<x-onboarding-layout title="{{ __('How would you like to be seen on Photi?') }}" currentStep=1>
    <x-section title="{{ __('Profile Picture') }}" subtitle="{{ __('Ideally a square image and under 2 megabytes') }}">
        <x-input type="file" name="unused" />
    </x-section>
    <x-section title="{{ __('Bio') }}" subtitle="{{ __('Tell others a little bit about yourself') }}">
        <x-textarea name="unused" rows=5 />
    </x-section>

    <x-slot name="footer">
        <x-button secondary href="{{ route('onboarding.preferences') }}">
            {{ __('Skip') }}
        </x-button>
        <x-button primary href="{{ route('onboarding.preferences') }}">
            {{ __('Next') }}
        </x-button>
    </x-slot>

</x-onboarding-layout>
