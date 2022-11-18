@props(['title'])

<x-app-layout title="{{ $title }} - {{ __('Preferences') }}">
    <x-slot name="aside">
        @include('components.preferences.navigation')
    </x-slot>
    {{ $slot }}
</x-app-layout>
