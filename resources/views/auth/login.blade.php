<x-auth-layout title="{{ __('Log In') }}">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <x-section title="{{ __('Email') }}">
            <x-input type="email" name="email" placeholder="howdy@photi.studio" required="true" autofocus />
        </x-section>
        <x-section title="{{ __('Password') }}">
            <x-input type="password" name="password" required="true" />
        </x-section>
        <div class="authentication__form--actions">
            @if (Route::has('password.request'))
                <x-button-link href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </x-button-link>
            @endif
            <x-button primary type="submit">
                {{ __('Log in') }}
                <i class="icon fa-solid fa-arrow-right"></i>
            </x-button>
        </div>
    </form>
</x-auth-layout>
