<x-onboarding-layout title="{{ __('Add People you know on Photi') }}" currentStep=3>
    CONTENT HERE

    <x-slot name="footer">
        <x-button href="{{ route('home') }}">
            {{ __('Skip') }}
        </x-button>
        <x-button primary href="{{ route('home') }}">
            {{ __('Finish') }}
        </x-button>
    </x-slot>

</x-onboarding-layout>
