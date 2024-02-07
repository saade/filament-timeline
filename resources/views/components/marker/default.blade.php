@props([
    'color' => 'gray',
])

<div class="relative flex items-center justify-center flex-none w-2 h-2 mx-4 my-3 rounded-full">
    <div
        @class([
            "h-2 w-2 rounded-full ring-2",
            match ($color) {
                'gray' => 'bg-gray-100 ring-gray-500 dark:bg-gray-500/20 dark:ring-gray-500',
                default => 'bg-custom-100 ring-custom-500 dark:bg-custom-500/20 dark:ring-custom-500',
            }
        ])
        @style([
            \Filament\Support\get_color_css_variables(
                $color,
                shades: [100, 500],
            ) => $color !== 'gray',
        ])
    ></div>
</div>