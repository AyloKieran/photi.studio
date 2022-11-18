<x-auth-layout title="{{ __('Verify Your Email Address') }}">
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        @if (session('status') != 'verification-link-sent')
            <x-authentication.message
                message="{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you did not receive the email, we will gladly send you another.') }}" />
        @else
            <x-authentication.message
                message="{{ __('A new verification link has been sent to the email address you provided during registration.') }}" />
        @endif
        <div class="authentication__form--actions">
            <x-button primary type="submit">
                {{ __('Resend Verification Email') }}
                <i class="icon fa-solid fa-arrow-right"></i>
            </x-button>
        </div>
    </form>
</x-auth-layout>
