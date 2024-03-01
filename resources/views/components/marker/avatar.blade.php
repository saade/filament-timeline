@php
    use Saade\FilamentTimeline\Enums\Size;
@endphp

@props([
    'avatar',
    'size' => Size::Large,
    'icon' => null,
    'iconColor' => 'gray',
])

<div class="fi-timeline-marker-avatar relative">
    <x-filament-timeline::avatar :avatar="$avatar" :size="$size" />

    @if ($icon)
        <span class="absolute w-6 h-6 p-1 bg-white rounded-full dark:bg-gray-900 -bottom-2 -right-2">
            <x-filament-timeline::icon
                :icon="$icon"
                :color="$iconColor"
                :size="Size::Small"
            />
        </span>
    @endif
</div>