<x-onboarding-layout title="{{ __('Add People you know on Photi') }}" currentStep=3>
    <form method="POST" action="{{ route('onboarding.friends.store') }}" id="onboardingForm">
        @csrf
        Content Here
    </form>
    <x-slot name="footer">
        <x-button href="{{ route('home') }}">
            {{ __('Skip') }}
        </x-button>
        <x-button primary type="submit" form="onboardingForm">
            {{ __('Finish') }}
        </x-button>
    </x-slot>

</x-onboarding-layout>
