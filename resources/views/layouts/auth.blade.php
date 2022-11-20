@props(['title'])

<x-base-layout title="{{ $title }}">

    <body class="wrapper authentication">
        @include('components.authentication.images')
        <div class="authentication__auth">
            <div class="authentication__header">
                <x-logo />
            </div>
            <div class="authentication__form">
                <section class="header">
                    <h1 class="header__title">{{ $title }}</h1>
                </section>
                {{ $slot }}
            </div>
            <div class="authentication__footer">
                @auth
                    MOVE ME
                    Signed in as {{ auth()->user()->name }}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-button secondary type="submit">
                            {{ __('Log Out') }}
                        </x-button>
                    </form>
                @endauth
            </div>
        </div>
    </body>
</x-base-layout>
