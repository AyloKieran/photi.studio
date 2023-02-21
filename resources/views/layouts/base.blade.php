@props(['title' => ''])

<!DOCTYPE html>
<html lang="en" class="theme--{{ $theme }}">

@php
    $title = isset($title) ? $title . ' | ' : '';
@endphp

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon shortcut" href="{{ asset('favicon.png') }}">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <meta name="theme-color" content="#20222D">
    <title>{{ $title }}{{ config('app.name') }}</title>
    <meta name="description" content="A social media platform for photographers.">
    @vite(['resources/css/UI/main.scss'])
    @livewireStyles
    @vite(['resources/js/app.js'])
</head>

{{ $slot }}
@livewireScripts
<script src="/register-sw.js" defer></script>

</html>
