@props(['title'])

<x-app-layout title="{{ $title }} - {{ __('Preferences') }}">
    {{-- TO DO: make this a component --}}
    <x-slot name="aside">
        <div class="nav">
            <div class="nav__section">
                <span class="nav__section-title">Account</span>
                <div class="nav__link nav__link--active">
                    <i class="nav__link-icon icon fa-solid fa-user"></i>
                    <div class="nav__link-title">Profile Information</div>
                </div>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-brush"></i>
                    <div class="nav__link-title">Theme</div>
                </div>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-key"></i>
                    <div class="nav__link-title">Change Password</div>
                </div>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-trash"></i>
                    <div class="nav__link-title">Deactivate Profile</div>
                </div>
            </div>
            <div class="nav__section">
                <span class="nav__section-title">My Data</span>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-camera"></i>
                    <div class="nav__link-title">Photos</div>
                </div>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-book"></i>
                    <div class="nav__link-title">Comments</div>
                </div>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-thumbs-up"></i>
                    <div class="nav__link-title">Likes</div>
                </div>
            </div>
            <div class="nav__section">
                <span class="nav__section-title">Social</span>
                <div class="nav__link">
                    <i class="nav__link-icon icon fa-solid fa-bolt"></i>
                    <div class="nav__link-title">Connected Accounts</div>
                </div>
            </div>
        </div>
    </x-slot>
    {{ $slot }}
</x-app-layout>
