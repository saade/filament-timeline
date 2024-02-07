@php
    use Saade\FilamentTimeline\Components\TimelineEntry\Enums\Size;
@endphp

@props([
    'avatar',
    'size' => Size::Large,
])

<img
    src="{{ $avatar }}"
    @class([
        'flex items-center justify-center bg-gray-400 rounded-full',
        match ($size) {
            Size::ExtraSmall, 'xs', Size::Small, 'sm' => 'fi-in-timeline-marker-avatar-size-sm h-6 w-6',
            Size::Medium, 'md' => 'fi-in-timeline-marker-avatar-size-md h-8 w-8',
            Size::Large, 'lg', Size::ExtraLarge, 'xl', Size::TwoExtraLarge, '2xl' => 'fi-in-timeline-marker-avatar-size-lg h-10 w-10',
            default => $size,
        },
    ])
/>