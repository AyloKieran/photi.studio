<x-auth-layout title=" {{ __('Reset Password') }}">

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <x-section title="{{ __('Email') }}">
            <x-input type="email" name="email" value="{{ $request->email }}" />
        </x-section>
        <x-section title="{{ __('Password') }}">
            <x-input type="password" name="password" required />
        </x-section>
        <x-section title="{{ __('Password Confirmation') }}">
            <x-input type="password" name="password_confirmation" required />
        </x-section>
        <div class="authentication__form--actions">
            <x-button primary type="submit">
                {{ __('Reset Password') }}
                <i class="icon fa-solid fa-arrow-right"></i>
            </x-button>
        </div>
    </form>
</x-auth-layout>
