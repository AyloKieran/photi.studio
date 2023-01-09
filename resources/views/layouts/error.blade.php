@props(['title', 'subtitle'])

<x-base-layout title="{{ $title }}">

    <body class="wrapper error">
        @include('components.authentication.images')
        <div class="error__holder">
            <div class="error__title">
                {!! $title !!}
            </div>
            <div class="error__subtitle">
                {!! $subtitle !!}
            </div>
            <x-button class="error__button" href="{{ route('home') }}">
                {{ __('Go home') }}
            </x-button>
        </div>
    </body>
</x-base-layout>
