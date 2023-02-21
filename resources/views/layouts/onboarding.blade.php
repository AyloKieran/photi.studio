@props(['title', 'subtitle' => '', 'currentStep'])

@php
    $currentStep = intval($currentStep) ?? 1;
@endphp

<x-base-layout title="{{ $title }}">
    <x-loader />

    <body class="wrapper authentication">
        @include('components.authentication.images')
        <div class="onboarding">
            <div class="onboarding__header">
                <x-logo />
            </div>
            <div class="onboarding__holder">
                <div class="onboarding__card">
                    <div class="onboarding__steps">
                        <x-onboarding-step label="Profile" step=1 :currentStep=$currentStep />
                        <x-onboarding-step label="Preferences" step=2 :currentStep=$currentStep />
                        <x-onboarding-step label="Friends" step=3 :currentStep=$currentStep last />
                    </div>
                </div>
                <div class="onboarding__card">
                    <x-header title="{{ $title }}" subtitle="{{ $subtitle }}" />
                    <div class="onboarding__content">
                        {{ $slot }}
                    </div>
                    @isset($footer)
                        <x-footer>
                            {{ $footer }}
                        </x-footer>
                    @endisset
                </div>
            </div>
            <div class="onboarding__footer">
                <div class="onboarding__card">
                    <div class="authentication__footer-actions">
                        <div class="authentication__footer-user">
                            <img src="{{ Auth::user()->avatar }}"
                                alt="{{ __(':name\'s Profile Picture', ['name' => auth()->user()->preferred_name]) }}">
                            <span>{{ Auth()->user()->preferred_name }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-button secondary type="submit">
                                {{ __('Log Out') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-base-layout>
