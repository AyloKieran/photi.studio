@props(['title', 'subtitle' => '', 'name'])

<div class="modal modal--open" id="modal-{{ $name }}">
    <div class="modal__holder">
        <div class="modal__header">
            <x-header title="{{ $title }}" subtitle="{{ $subtitle }}">
                <x-button onclick="console.log('close modal {{ $name }}')">
                    <i class="icon fa-solid fa-close"></i>
                </x-button>
            </x-header>
        </div>
        <div class="modal__content">
            {{ $slot }}
        </div>
    </div>
</div>
