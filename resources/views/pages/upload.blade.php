<x-app-layout title="{{ __('Upload Photo') }}">
    <div class="upload">
        <div class="upload__holder">
            <div class="upload__header">
                <x-header title="{{ __('Upload Photo') }}" subtitle="{{ __('text text text') }}" />
            </div>
            <div class="upload__content">
                <form method="POST" action="{{ route('upload.store') }}" id="uploadForm" enctype="multipart/form-data">
                    @csrf
                    <x-section title="{{ __('Image File') }}"
                        subtitle="{{ __('Ideally as high quality as you can, under 10MB') }}">
                        <x-input-file name="image" required />
                        {{-- <x-input type="file" name="image" required /> --}}
                    </x-section>
                    <x-section title="{{ __('Title') }}"
                        subtitle="{{ __('Let people know what your post is about') }}">
                        <x-input name="title" type="text" required />
                    </x-section>
                    <x-section title="{{ __('Description') }}"
                        subtitle="{{ __('Give people some more information about your photo\'s story') }}">
                        <x-textarea name="description" />
                    </x-section>
                </form>
            </div>
            <div class="upload__footer">
                <hr class="seperator" />
                <div class="upload__footer-holder">
                    <x-button primary type="submit" form="uploadForm">
                        <i class="icon fa-solid fa-upload"></i>
                        {{ __('Upload') }}
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
