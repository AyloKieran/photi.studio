<x-auth-layout title="{{ __('Register') }}">

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <x-section title="{{ __('Name') }}">
            <x-input type="text" name="name" placeholder="John Doe" required="true" autofocus />
        </x-section>
        <x-section title="{{ __('Email') }}">
            <x-input type="email" name="email" placeholder="howdy@photi.studio" required="true" />
        </x-section>
        <x-section title="{{ __('Password') }}">
            <x-input type="password" name="password" required="true" />
        </x-section>
        <x-section title="{{ __('Password Confirmation') }}">
            <x-input type="password" name="password_confirmation" required="true" />
        </x-section>
        <div class="authentication__form--actions">
            @if (Route::has('login'))
                <x-button-link href="{{ route('login') }}">
                    {{ __('Already Registered?') }}
                </x-button-link>
            @endif
            <x-button primary type="submit">
                {{ __('Register') }}
                <i class="icon fa-solid fa-arrow-right"></i>
            </x-button>
        </div>
    </form>
</x-auth-layout>
