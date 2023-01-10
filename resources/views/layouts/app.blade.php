@props(['title'])

<x-base-layout title="{!! $title !!}">
    @include('layouts.navigation')

    <body class="wrapper">
        <section class="pageContent">

            @if ($aside ?? false)
                <x-aside-layout>
                    {{ $aside }}
                </x-aside-layout>
            @endif

            <div class="pageContent__main">
                {{ $slot }}
            </div>
        </section>
    </body>

</x-base-layout>
