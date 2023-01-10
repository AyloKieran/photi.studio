@props(['name', 'value' => '', 'placeholder' => '', 'required' => false, 'autofocus' => false, 'autocomplete' => 'off', 'rows' => 3])

<div class="control control__input">
    <textarea name={{ $name }} class="@if ($errors->has($name)) error @endif"
        placeholder="{{ $placeholder }}" rows={{ $rows }} @if ($required) required @endif
        @if ($autofocus && !$errors->has($name)) autofocus @endif autocomplete="{{ $autocomplete }}">{{ old($name) != null ? old($name) : $value }}</textarea>
    @error($name)
        <p class="control__input--error">{{ $errors->first($name) }}</p>
    @enderror
</div>
