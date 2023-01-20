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
    <title>{{ $title }}{{ config('app.name') }}</title>
    @vite(['resources/css/UI/main.scss'])
    @vite(['resources/js/app.js'])
</head>

{{ $slot }}

</html>
