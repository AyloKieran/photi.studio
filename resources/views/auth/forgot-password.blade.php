<x-auth-layout title="{{ __('Forgot Password') }}">

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        @if (session('status') == '')
            <x-authentication.message
                message="{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}" />
        @else
            <x-authentication.message message="{{ session('status') }}" />
        @endif
        <x-section title="{{ __('Email') }}">
            <x-input type="email" name="email" placeholder="howdy@photi.studio" required autofocus />
        </x-section>
        <div class="authentication__form--actions">
            <x-button primary type="submit">
                {{ __('Email Password Reset Link') }}
                <i class="icon fa-solid fa-arrow-right"></i>
            </x-button>
        </div>
    </form>
</x-auth-layout>
