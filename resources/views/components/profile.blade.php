@props(['user'])

<x-section>
    <div class="profile">
        <div class="profile__section profile__section--user">
            <div class="profile__user">
                <div class="profile__user-avatar">
                    <img src="{{ $user->avatar }}" alt="{{ $user->preferred_name }}">
                </div>
                <div class="profile__user-info">
                    <div class="profile__user-info-name">
                        {{ $user->name }}
                    </div>
                    <div class="profile__user-info-username">
                        {{ $user->username }}
                    </div>
                </div>
                <div class="profile__user-stats">
                    <x-profile.user.stat count="1688" label="{{ __('Posts') }}" />
                    <x-profile.user.stat count="1920" label="{{ __('Following') }}" />
                    <x-profile.user.stat count="1277" label="{{ __('Followers') }}" />
                    <x-profile.user.stat count="5677" label="{{ __('Likes') }}" />
                </div>
            </div>
        </div>
        <div class="profile__section-holder">
            <div class="profile__section" style="flex-grow: 1;">
                <div class="section__title">
                    Bio
                </div>
                I am an experienced content writer and digital marketing expert, with a proven track record of writing
                engaging, informative content. My diverse expertise creates powerful marketing campaigns that generate
                ROI across a wide range of industries I am an experienced content writer and digital marketing expert,
                with a proven track record of writing
            </div>
            <div class="profile__section">
                <div class="profile__user-actions" style="flex-wrap: wrap; max-width: 100vw;">
                    <div class="profile__user-actions-section">
                        <div style="display: flex; gap: var(--spacing2);">
                            @for ($i = 0; $i < 3; $i++)
                                <a href="#"
                                    style="display: flex; flex-wrap: 0; gap: var(--spacing1); background-color: var(--action__background); padding: var(--spacing1) var(--spacing2); border-radius: var(--rounded--large); font-size: 12px; margin: auto 0;">
                                    <i class="icon fa-brands fa-twitter" style="color: white;"></i>
                                    @AyloKieran
                                </a>
                            @endfor
                        </div>
                    </div>
                    <div class="profile__user-actions-section">
                        <x-button primary rounded>
                            <i class="icon fa-solid fa-plus"></i>
                            {{ __('Follow') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-section>
