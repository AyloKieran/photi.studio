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

<x-app-layout title="{{ __('#:tag Tagged Posts', ['tag' => $tag]) }}">
    <x-header title="{{ __('\'#:tag\' Tagged Posts', ['tag' => $tag]) }}">
    </x-header>
    <div class="content__holder">
        <x-posts-holder>
            @for ($i = 0; $i < 50; $i++)
                <x-hover-image />
            @endfor
        </x-posts-holder>
    </div>
    <x-modal title="{{ __('Filter Posts') }}" subtitle="{{ __('Refine what you see by choosing from the options') }}"
        name="tester">
        <x-section title="{{ __('Likes') }}"
            subtitle="{{ __('What is the minimum number of likes a post should have?') }}">
            <x-radio name="radio1" :values="$values" />
        </x-section>
        <x-section title="{{ __('Age') }}" subtitle="{{ __('What is the minimum age a post should be?') }}">
            <x-radio name="radio2" :values="$values" />
        </x-section>
        <x-section title="{{ __('Comments') }}"
            subtitle="{{ __('What is the minimum number of comments posts should have?') }}">
            <x-radio name="radio3" :values="$values" />
        </x-section>
    </x-modal>
</x-app-layout>
