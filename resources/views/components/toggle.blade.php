@props(['name', 'value' => false])

<div class="control control__toggle">
    <div class="control__toggle-holder">
        <label>
            <input type="checkbox" name="{{ $name }}" @if ($value == 'true') checked @endif>
            <span class="control__toggle--slider"></span>
        </label>
    </div>
    @error($name)
        <p class="control__input--error">{{ $errors->first($name) }}</p>
    @enderror
</div>
