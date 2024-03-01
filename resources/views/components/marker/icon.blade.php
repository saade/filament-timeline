@php
    use Saade\FilamentTimeline\Enums\Size;
@endphp

@props([
    'icon',
    'iconColor' => 'gray',
    'iconSize' => Size::Medium,
])

<div class="fi-timeline-marker-icon flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-800">
    <x-filament-timeline::icon :icon="$icon" :color="$iconColor" :size="$iconSize" />
</div>