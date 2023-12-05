@php
    use Saade\FilamentTimeline\Components\TimelineEntry\Enums\Size;
@endphp

@props([
    'avatar',
    'size' => Size::Large,
    'icon' => Size::Medium,
    'iconColor' => 'gray',
])

<div class="relative">
    <x-filament-timeline::avatar :avatar="$avatar" :size="$size" />

    @if ($icon)
        <span class="absolute w-6 h-6 p-1 bg-white rounded-full dark:bg-gray-900 -bottom-1 -right-2">
            <x-filament-timeline::icon
                :icon="$icon"
                :color="$iconColor"
            />
        </span>
    @endif
</div>