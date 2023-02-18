@props(['type', 'name', 'value' => '', 'placeholder' => '', 'required' => false, 'autofocus' => false, 'autocomplete' => 'off', 'wire' => null])

<div class="control control__input">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="@if ($errors->has($name)) error @endif" placeholder="{{ $placeholder }}"
        value="{{ old($name) != null ? ($type != 'password' ? old($name) : '') : $value }}"
        @if ($required) required @endif @if ($autofocus && !$errors->has($name)) autofocus @endif
        autocomplete="{{ $autocomplete }}" @if (isset($wire)) wire:model="{{ $wire }}" @endif>
    @error($name)
        <p class="control__input--error">{{ $errors->first($name) }}</p>
    @enderror
</div>
