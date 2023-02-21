@props(['title'])

<x-base-layout title="{{ $title }}">
    <x-loader />

    <body class="wrapper authentication">
        <div class="authentication__auth">
            <div class="authentication__header">
                <x-logo />
            </div>
            <div class="authentication__form">
                <x-header title="{{ $title }}" includeSeperator="false" />
                {{ $slot }}
            </div>
            <div class="authentication__footer">
                @auth
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
                @endauth
            </div>
        </div>
        @include('components.authentication.images')
    </body>
</x-base-layout>
