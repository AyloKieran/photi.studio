<x-auth-layout title="{{ __('Confirm Password') }}">
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <x-authentication.message
            message="{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}" />
        <x-section title="{{ __('Password') }}">
            <x-input type="password" name="password" required autofocus />
        </x-section>
        <div class="authentication__form--actions">
            <x-button primary type="submit">
                {{ __('Confirm') }}
                <i class="icon fa-solid fa-arrow-right"></i>
            </x-button>
        </div>
    </form>
</x-auth-layout>
