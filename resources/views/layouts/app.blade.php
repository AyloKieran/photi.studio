@props(['title', 'asideLabel' => null])

<x-base-layout title="{!! $title !!}">
    <x-loader />
    @include('layouts.navigation')

    <body class="wrapper">
        <section class="pageContent">

            @if ($aside ?? false)
                <x-aside-layout label="{{ $asideLabel ?? '' }}">
                    {{ $aside }}
                </x-aside-layout>
            @endif

            <div class="pageContent__main">
                {{ $slot }}
            </div>
        </section>
    </body>

</x-base-layout>
