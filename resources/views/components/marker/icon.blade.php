@php
    use Saade\FilamentTimeline\Components\TimelineEntry\Enums\Size;
@endphp

@props([
    'icon',
    'iconColor' => 'gray',
    'iconSize' => Size::Medium,
])

<div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-800 ring-8 ring-white dark:ring-gray-900">
    <x-filament-timeline::icon :icon="$icon" :color="$iconColor" :size="$iconSize" />
</div>