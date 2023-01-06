@props(['count', 'label'])

<div class="profile__user-stat">
    <div class="profile__user-stat-count">
        {{ $count }}
    </div>
    <div class="profile__user-stat-label">
        {{ $label }}
    </div>
</div>
