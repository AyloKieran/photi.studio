@props(['name', 'values' => [], 'required' => false, 'autofocus' => false])

@php
    $selectText = arrayFindByFieldValue($values, 'checked', true);
@endphp

<div class="control control__dropdown">
    <div class="control__button">
        <span class="control__button-text">{{ isset($selectText) ? $selectText : __('Select...') }}</span>
        <i class="control__button-icon icon fa-solid fa-chevron-down"></i>
    </div>
    @if ($values[0] ?? false)
        <div class="control__dropdown-content">
            @foreach ($values as $value)
                <label class="control__dropdown-item">
                    <input type="radio" name="{{ $name }}" value="{{ $value->value }}"
                        @if ($value->checked ?? false) checked @endif>
                    <div class="control__dropdown-item-text">
                        <span>{{ $value->key }}</span>
                        <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                    </div>
                </label>
            @endforeach
        </div>
    @endif
</div>
