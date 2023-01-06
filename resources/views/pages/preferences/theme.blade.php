@php
    $values = [
        (object) [
            'key' => 'Item One',
            'value' => 'item-one',
            'checked' => true,
        ],
        (object) [
            'key' => 'Item Two',
            'value' => 'item-two',
            'checked' => false,
        ],
        (object) [
            'key' => 'Item Three',
            'value' => 'item-three',
            'checked' => false,
        ],
    ];
@endphp

<x-preferences-layout title="{{ __('Theme') }}">
    <x-header title="{{ __('Theme') }}" subtitle="{{ __('How do you want Photi.Studio to look and feel?') }}" />
    <main class="content">
        <div class="content__holder">
            Content
            <div class="content__footer">
                footer
            </div>
        </div>
    </main>
</x-preferences-layout>
