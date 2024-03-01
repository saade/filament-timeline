@php
    use Saade\FilamentTimeline\Enums\Size;
@endphp

@props([
    'icon',
    'color' => 'gray',
    'size' => Size::Medium,
])

<x-filament::icon
    :icon="$icon"
    @class([
        'fi-in-timeline-icon',
        match ($size) {
            Size::ExtraSmall, 'xs' => 'fi-in-timeline-marker-icon-size-xs h-3 w-3',
            Size::Small, 'sm' => 'fi-in-timeline-marker-icon-size-sm h-4 w-4',
            Size::Medium, 'md' => 'fi-in-timeline-marker-icon-size-md h-5 w-5',
            Size::Large, 'lg' => 'fi-in-timeline-marker-icon-size-lg h-6 w-6',
            Size::ExtraLarge, 'xl' => 'fi-in-timeline-marker-icon-size-xl h-7 w-7',
            Size::TwoExtraLarge, '2xl' => 'fi-in-timeline-marker-icon-size-2xl h-8 w-8',
            default => $size,
        },
        match ($color) {
            'gray' => 'text-gray-400 dark:text-gray-500',
            default => 'text-custom-500',
        },
    ])
    @style([
        \Filament\Support\get_color_css_variables(
            $color,
            shades: [500],
        ) => $color !== 'gray',
    ])
/>