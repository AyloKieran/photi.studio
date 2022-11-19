@props(['title'])

<x-base-layout title="{{ $title }}">

    <body class="wrapper authentication">
        @include('components.authentication.images')
        <div class="authentication__auth">
            <div class="">logo</div>
            <div class="authentication__form">
                <section class="header">
                    <h1 class="header__title">{{ $title }}</h1>
                </section>
                {{ $slot }}
            </div>
            @auth
                MOVE ME
                Signed in as {{ auth()->user()->name }}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-button secondary type="submit">
                        {{ __('Log Out') }}
                    </x-button>
                @endauth
        </div>
    </body>
</x-base-layout>
