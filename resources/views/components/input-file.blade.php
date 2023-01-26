@props(['name', 'required' => false, 'autofocus' => false])

<div class="control control__input--file">
    <label for="{{ $name }}">
        <i class="icon fa-solid fa-upload"></i>
        <x-input type="file" :name=$name :required=$required :autofocus=$autofocus />
    </label>
</div>
