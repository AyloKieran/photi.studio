@props(['title'])

<x-app-layout title="{{ $title }} - {{ __('Preferences') }}" asideLabel="{{ __('Settings') }}">
    <x-slot name="aside">
        @include('components.preferences.navigation')
    </x-slot>
    {{ $slot }}
</x-app-layout>
