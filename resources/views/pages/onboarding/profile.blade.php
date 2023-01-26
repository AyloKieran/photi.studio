<x-onboarding-layout title="{{ __('How would you like to be seen on Photi?') }}" currentStep=1>
    <form method="POST" action="{{ route('onboarding.profile.store') }}" id="onboardingForm" enctype="multipart/form-data">
        @csrf
        <x-section title="{{ __('Profile Picture') }}" subtitle="{{ __('Ideally a square image') }}">
            <x-input-file name="profile-picture" />
        </x-section>
        <x-section title="{{ __('Bio') }}" subtitle="{{ __('Tell others a little bit about yourself') }}">
            <x-textarea name="bio" rows=3 />
        </x-section>

        <x-slot name="footer">
            <x-button secondary href="{{ route('onboarding.preferences') }}">
                {{ __('Skip') }}
            </x-button>
            <x-button primary type="submit" form="onboardingForm">
                {{ __('Next') }}
            </x-button>
        </x-slot>
    </form>
</x-onboarding-layout>
