@props(['name', 'value' => '', 'placeholder' => '', 'required' => false, 'autofocus' => false, 'autocomplete' => 'off'])

<div class="control control__input">
    <textarea name={{ $name }} class="@if ($errors->has($name)) error @endif"
        value="{{ old($name) != null ? old($name) : $value }}" placeholder="{{ $placeholder }}" required="{{ $required }}"
        @if ($autofocus && !$errors->has($name)) autofocus @endif autocomplete="{{ $autocomplete }}"></textarea>
    @error($name)
        <p class="control__input--error">{{ $errors->first($name) }}</p>
    @enderror
</div>
