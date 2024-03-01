@php
    $color = $marker->getColor();

    $avatar = $marker->getAvatar();
    $avatarSize = $marker->getAvatarSize();

    $icon = $marker->getIcon();
    $iconSize = $marker->getIconSize();
@endphp

<div class="fi-timeline-marker">
    @if ($avatar)
        <x-filament-timeline::marker.avatar
            :avatar="$avatar"
            :avatar-size="$avatarSize"
            :icon="$icon"
            :icon-color="$color"
        />
    @endif

    @if ($icon && ! $avatar)
        <x-filament-timeline::marker.icon
            :icon="$icon"
            :icon-color="$color"
            :icon-size="$iconSize"
        />
    @endif

    @if(! $icon && ! $avatar)
        <x-filament-timeline::marker.default
            :color="$color"
        />
    @endif
</div>