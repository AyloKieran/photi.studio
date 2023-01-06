<x-onboarding-layout title="{{ __('What would you like to see on Photi?') }}"
    subtitle="{{ __('Please select a minimum of 5 tags that interest you') }}" currentStep=2>
    CONTENT HERE

    <x-slot name="footer">
        <x-button primary href="{{ route('onboarding.friends') }}">
            {{ __('Next') }}
        </x-button>
    </x-slot>

</x-onboarding-layout>
