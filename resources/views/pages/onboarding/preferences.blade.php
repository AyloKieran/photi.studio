<x-onboarding-layout title="{{ __('What would you like to see on Photi?') }}"
    subtitle="{{ __('Please select a minimum of 5 tags that interest you') }}" currentStep=2>
    <form method="POST" action="{{ route('onboarding.preferences.store') }}" id="onboardingForm">
        @csrf
        Content Here
    </form>
    <x-slot name="footer">
        <x-button primary type="submit" form="onboardingForm">
            {{ __('Next') }}
        </x-button>
    </x-slot>

</x-onboarding-layout>
