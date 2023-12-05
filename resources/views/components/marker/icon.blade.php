@php
    use Saade\FilamentTimeline\Components\TimelineEntry\Enums\Size;
@endphp

@props([
    'icon',
    'iconColor' => 'gray',
    'iconSize' => Size::Medium,
])

<div
    @class([
        'flex items-center justify-center w-8 h-8 rounded-full ring-8 ring-white mx-1',
        match ($iconColor) {
            'gray' => 'fi-color-gray bg-gray-50 text-gray-600 ring-gray-600/10 dark:bg-gray-400/10 dark:text-gray-400 dark:ring-gray-400/20',
            default => 'fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30',
        },
    ])
    @style([
        \Filament\Support\get_color_css_variables(
            $iconColor,
            shades: [50, 400, 600],
        ) => $iconColor !== 'gray',
    ])
>
    <x-filament-timeline::icon :icon="$icon" :color="$iconColor" :size="$iconSize" />
</div>